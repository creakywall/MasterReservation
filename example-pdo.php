<?php

/* This is just for the demo, to control the debug output */
header('Content-type: text/plain'); /* This is just for the demo, to control the debug output */

/* This is just to make the demo stand-alone, not requiring a form */
$_POST['searchtype'] = 'title';
$_POST['searchterm'] = 'King';

/* Create our database first - this particular syntax creates an in-RAM 
 * database that only survives a single script execution */
$pdo = new PDO('sqlite::memory:');

/* Now set the error reporting mode to use exceptions - 
 * it's silent by default; see http://php.net/pdo.error-handling */
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* example data set */
$books = array(
    array(':id' => 0, ':author' => 'J. R. R. Tolkien', ':title' => 'The Lord of the Rings: The Fellowship of the Ring',),
    array(':id' => 1, ':author' => 'J. R. R. Tolkien', ':title' => 'The Lord of the Rings: The Two Towers',),
    array(':id' => 2, ':author' => 'J. R. R. Tolkien', ':title' => 'The Lord of the Rings: The Return of the King',),
);

/* Create the tables and insert our example data set - you won't normally do these in production,
 * but we have to because we're using sqlite::memory */

$result = $pdo->exec('CREATE TABLE books(id int, title varchar(255), author varchar(255))');
$stmt = $pdo->prepare('INSERT INTO books(id, title, author) values(:id, :title, :author)');
try {
        foreach($books as $book) $stmt->execute($book);
} catch (PDOException $e) {
        var_dump($e); /* obviously, this is not something you want to do in production... */
}
/* OK, now the database exists and has data, we can query it */

/* Now we're going to see how to safely handle a dynamic search from an HTTP request - for example, you might
 * give them a drop down to select 'Author', 'Title', or 'ISBN/ID'. An example would be this form located on
 * web page of the Salt Lake City Public Library in Salte Lake City, Utah: http://screencast.com/t/RJ6FMazTQ */

switch($_POST['searchtype']) {
    case 'title':       /* fall-through */
    case 'author':      /* fall-through */
    case 'id':          /* fall-through */
        /* As long as it's one of our 3 supported options, we're going to execute the same query. Note how we
         * can't use a bound parameter for the field name - we have to do string interpolation. This is th
         * reason for the switch-statement. */
        $query = $pdo->prepare("select * from books where $_POST[searchtype] LIKE :search");
        break;

    default:
        /* They tried to do something unexpected, and possibly evil. Log it and do something smart about it. */
}

if (! $query->execute(array(':search' => '%'.$_POST['searchterm'].'%'))) {
    /* No matches, do something about it */
} else {
    foreach($query->fetchAll(PDO::FETCH_BOTH) as $row) {
        var_dump($row); /* obviously, this is not something you want to do in production... */
    }
}
