for i in `seq 1 1092`; 
do
    j=$((i+1092));
    cp ../shatin/history$i.php ./history$j.php;
done