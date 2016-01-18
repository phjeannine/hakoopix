<?php

$insertContest = pg_query($db, "INSERT INTO contest(title, date_begin, date_ending, description, is_active) VALUES ('test-title', '01/12/2016', '01/24/2016', 'test description', true)");

echo "OK";

?>