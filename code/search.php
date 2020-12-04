<?php 
include_once './admin/partials/connection.php';
include('partails/public_head.php');
include('partails/public_header.php');
?>

<?php


// if(isset($_POST['submit'])){
//     $search = $_POST['search'];
    // $search = trim($search);
    // if ($search == "") {
    //     echo  "<p class='error'>Search Error. Please Enter Your Search Query.</p>" ;
    //     exit();
    //         }
      
    //   if ($search == "%" || $search == "_" || $search == "+" ) {
    //     echo  "<p class='error1'>Search Error. Please Enter a Valid Search Query.</p>" ;
    //     exit();
    //         }
        //     SELECT
        //     *,
        //     MATCH (`forename`)
        //     AGAINST ('{$search}' IN NATURAL LANGUAGE MODE) AS `score`
        // FROM `jobseeker`
        // WHERE
        //     MATCH (`forename`)
        //     AGAINST ('{$search}' IN NATURAL LANGUAGE MODE)";
    //    $query = "SELECT * FROM products
    //     WHERE MATCH (pro_name,pro_description)
    //     AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
//     $query = "SELECT * FROM products WHERE pro_name LIKE '%$search%' OR pro_description LIKE '%$search%' ";

//     $result = mysqli_query($conn,$query);
//     while($row = mysqli_fetch_assoc($result)){
//         // echo "<img src = 'admin/images/product_images/{$row['pro_image']}'>";
//         echo "<img src= 'admin/{$row['pro_image']}'>";
        
//         echo $row['pro_name'];
//     }
// }



$query = $_GET['search']; 
    
	// gets value sent over search form
	
	$min_length = 3;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ 
		
		$query = htmlspecialchars($query); 
	
		
		$query = mysqli_real_escape_string($conn,$query);

        $searchTerms = explode(' ', $query);
$searchTermBits = array();
foreach ($searchTerms as $term) {
    $term = trim($term);
    if (!empty($term)) {
        $raw_results = "SELECT * FROM products 
     WHERE (`pro_description` LIKE '%$term%') OR (`pro_name`  LIKE '%$term%') " or die(mysqli_error());
        // $searchTermBits[] = "pro_long_desc LIKE '%$term%'";
        
    }
}


		$res = mysqli_query($conn, $raw_results);
        if(mysqli_num_rows($res) > 0){
          
			
			while($results = mysqli_fetch_array($res)){
			// $results = mysql_fetch_array($raw_results); //puts data from database into array, while it's valid it does the loop
			
            echo "<img src= 'admin/{$results['pro_image']}'>" . $results['pro_name'];
                echo "<p>".$results['pro_description']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
            }}
            else {
                echo "<h1>" . "Result Not Found" . "</h1>";
            }
        }
	

    
   

?>



<?php

include('partails/public_footer.php');

?>