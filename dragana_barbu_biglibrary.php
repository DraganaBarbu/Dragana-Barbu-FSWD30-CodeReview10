<?php

$servername = "localhost";

$username = "root";

$password = ""; 

$dbname = "cr10_dragana_barbu_biglibrary";


// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}




$sql = "INSERT INTO `media` (`media_id`, `type`, `title`, `image`, `short_description`, `publish_date`, `fk_author_id`, `fk_publisher_id`, `isbn_code`) VALUES
(1, 'book', ' Anna Karenina', 'http://ecx.images-amazon.com/images/I/51vPf2CfSEL._SL160_.jpg', 'Anna Karenina tells of the doomed love affair between the sensuous and rebellious Anna and the dashing officer, Count Vronsky. Tragedy unfolds as Anna rejects her passionless marriage and must endu.', '2015-03-05', 1, 1, 5684368965432),
(2, 'book', 'Madame Bovary', 'http://ecx.images-amazon.com/images/I/51o5dnjk07L._SL160_.jpg', 'For daring to peer into the heart of an adulteress and enumerate its contents with profound dispassion, the author of Madame Bovary was tried for offenses against morality and religion. What shoc', '2015-05-04', 2, 2, 5684653742432),
(3, 'book', 'The Great Gatsby', 'http://ecx.images-amazon.com/images/I/51o5dnjk07L._SL160_.jpg', 'The novel chronicles an era that Fitzgerald himself dubbed the \"Jazz Age\". Following the shock and chaos of World War I, American society enjoyed unprecedented levels of prosperity during the', '2013-07-26', 3, 3, 7534765982345),
(4, 'book', ' Lolita', 'https://images-na.ssl-images-amazon.com/images/I/41s2G6WxLvL._SL160_.jpg', 'The book is internationally famous for its innovative style and infamous for its controversial subject: the protagonist and unreliable narrator, middle aged Humbert Humbert, becomes obsessed and se', '2012-06-24', 4, 4, 5684654567842),
(5, 'book', 'The Adventures of Huckleberry Fin', 'http://ecx.images-amazon.com/images/I/51Ht1M-GPXL._SL160_.jpg', 'Revered by all of the towns children and dreaded by all of its mothers, Huckleberry Finn is indisputably the most appealing child-hero in American literature. Unlike the tall-tale, idyllic worl.', '2011-01-04', 5, 5, 1256783742432),
(6, 'book', 'Middlemarch', 'http://ecx.images-amazon.com/images/I/51eRjEMiOgL._SL160_.jpg', 'Middlemarch: A Study of Provincial Life is a novel by George Eliot, the pen name of Mary Anne Evans, later Marian Evans. It is her seventh novel, begun in 1869 and then put aside during the final', '2014-06-15', 6, 6, 1234567543212),
(7, 'book', 'The Stories of Anton Chekhov', 'https://images-na.ssl-images-amazon.com/images/I/51LzR19wPHL._SL160_.jpg', '\r\nAnton Pavlovich Chekhov was a Russian short-story writer, playwright and physician, considered to be one of the greatest short-story writers in the history of world literature. His career as a dram', '2010-11-07', 7, 7, 5689008776554),
(8, 'book', 'In Search of Lost Time', 'https://images-na.ssl-images-amazon.com/images/I/51me-a8zgcL._SL160_.jpg', 'Swanns Way, the first part of A la recherche de temps perdu, Marcel Prouss seven-part cycle, was published in 1913. In it, Proust introduces the themes that run through the entire work. The narr', '2015-02-14', 8, 8, 5684653742432),
(9, 'book', 'Hamlet', 'https://images-na.ssl-images-amazon.com/images/I/51xBp-sLaSL._SL160_.jpg', 'The Tragedy of Hamlet, Prince of Denmark, or more simply Hamlet, is a tragedy by William Shakespeare, believed to have been written between 1599 and 1601. The play, set in Denmark, recounts how Pri', '2012-04-23', 9, 9, 6789054321467),
(10, 'book', 'Moby Dick', 'http://ecx.images-amazon.com/images/I/51X8kMIIeBL._SL160_.jpg', 'First published in 1851, Melvilles masterpiece is, in Elizabeth Hardwicks words, \"the greatest novel in American literature.\" The saga of Captain Ahab and his monomaniacal pursuit of the white', '2009-05-22', 10, 10, 677687654467)";


if (mysqli_query($conn, $sql)) {

    echo "New record created.\n";

} else {

    echo "Record creation error for: " . $sql . "\n" . mysqli_error($conn);

}

mysqli_close($conn);



?>