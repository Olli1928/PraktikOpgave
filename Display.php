
<?
echo"Opgave 2";

function get_names() {
  $Navne  = array("Paul", "Richard", "Henry", "Philip", "Bruce", "Anna", "Jenny", "Laura", "Olivia", "Maria");
  
  foreach ( $Navne as $value) {
    echo "$value-";
  }

}

?>

<?
//Aflæser $Navne
echo get_names();
?>


<?
echo"Opgave 3";
?>

<?
echo"A)";
?>

<?
$suits = array("clubs", "diamonds", "hearts","spades");
$ranks = array("2", "3", "4","5","6","7","8","9","10","Jack","Queen","King","Ace");

foreach ($suits as $SValue) {
   
  
    
    foreach ($ranks as $RValue) {
      $rank=$RValue;
      $suit=$SValue;
      
      echo "$rank". 'of' ."$suit-";
    }
  }
?>



<?
echo"B)";
?>

<?
$suits = array("clubs", "diamonds", "hearts","spades");
$ranks = array("2", "3", "4","5","6","7","8","9","10","Jack","Queen","King","Ace");
$Deck = array();

foreach ($suits as $SValue) {
   
  
    
    foreach ($ranks as $RValue) {
      $rank=$RValue;
      $suit=$SValue;
      
      

      array_push($Deck,$rank."of".$suit );
    
    }
      
    }
    //Aflæser Deck
    foreach ($Deck as $Cards) {
        echo "$Cards-";}
?>



<?
echo"C)";
?>

<?

//Shuffel funktion 
function shuffel_recursive(&$arr)
{
  shuffle($arr);
  
}

$suits = array("clubs", "diamonds", "hearts","spades");
$ranks = array("2", "3", "4","5","6","7","8","9","10","Jack","Queen","King","Ace");
$Deck = array();
foreach ($suits as $SValue) {
   
  
    
    foreach ($ranks as $RValue) {
      $rank=$RValue;
      $suit=$SValue;
      
      

      array_push($Deck,$rank."of".$suit );
      
    
    }
    
    }
    //Shuffler Deck
    shuffel_recursive($Deck);
    

//Læser Shufflet Deck
  foreach ($Deck as $Cards) {
    echo "$Cards-";}
    
?>


<?
echo"Opgave 4";
?>

<?
echo"A)";
?>

<?
$suits = array("clubs", "diamonds", "hearts","spades");
$ranks = array("2", "3", "4","5","6","7","8","9","10","Jack","Queen","King","Ace");
//$ranks = array("2", "3", "4","5","6","7","8","9","10","11","12","13","1");
//$suits = array("a", "b", "c","d");

$Deck = array();

foreach ($suits as $SValue) {
   
  
    
    foreach ($ranks as $RValue) {
      $rank=$RValue;
      $suit=$SValue;
      
      $TempDeck = array($rank,$suit);
      
      //Skubber Arrays ind i Deck
      array_push($Deck,$TempDeck);



      
    
      }

    
      
      
    }
  
       //Funktion som retuner Suit og Rank som string
      function Cardstostring(array $arrDeck, $Value )
      {
        return   $arrDeck[$Value][0]. "of" .$arrDeck[$Value][1]."-" ;
      }

      //Shuffle
     shuffel_recursive($Deck);

    //Læser shufflet og tostringet Deck
      for ($x = 0; $x <= count($Deck)-1; $x++) {
        
        echo Cardstostring($Deck, $x);
        
      }
      

?>


<?
echo"B)";
?>
<?


shuffel_recursive($Deck);

for ($x = 0; $x <= count($Deck)-1; $x++) {
        
  Cardstostring($Deck, $x);
 
}
?>
<?
$Hand = array();

//Deal funktion 
function dealCard(array $Arr, $value)
{
    $TempHand = array();
    for ($x = 0; $x <= $value-1; $x++)
     {
        
        $TempDeck = array($Arr[$x][0],$Arr[$x][1]);

      array_push($TempHand,$TempDeck);

      
       
    }
      return $TempHand;
};
?>


<?
echo"Hand:";
//Hand Får X antal kort fra Deck
$Hand = dealCard($Deck,5);

//Hand bliver tostringet og læst
for ($x = 0; $x <= count($Hand)-1; $x++) {
        
    echo Cardstostring($Hand, $x);
  }

 
?>


<?
  
 
  echo"Deck:";
  for ($x = 0; $x <= count($Deck)-1; $x++) {
        
    echo Cardstostring($Deck, $x);
  }

  
  ?>


<?
echo"C)"

?>

<?
//metode som giver anstigt kort og æs en "numerisk" værdi 
function CardTranslate ($Cardranks)
{
   $ranks = array("2", "3", "4","5","6","7","8","9","10","Jack","Queen","King","Ace");
   $ranksnumer = array("2", "3", "4","5","6","7","8","9","10","11","12","13","14");
   for ($x = 0; $x <= count($ranks)-1; $x++)
   {
    if ($ranks[$x]  == $Cardranks)
        {
            return $ranksnumer[$x];
        }

   } 
}

// Funktion som retunere suits efter rækkefølge 
function CardTranslateSuits  ($Cardsuits)
{
    $suits = array("clubs", "diamonds", "hearts","spades");
   /// $suits = array("a", "b", "c","d");
   for ($x = 0; $x <= count($suits)-1; $x++)
   {
    if ($suits[$x]  == $Cardsuits)
        {
            return $x;
        }

   } 
}




// Funktion som sortere kort baseret på værdi og suit
function sortCards($Arr)
{
    for ($x = 0; $x <= count($Arr)-1; $x++) 
    {
             
        for ($y = 0; $y <= count($Arr)-1; $y++) 
        {
         //if(   $Arr[$x][0]   <  $Arr[$y][0]  )
         if (CardTranslate ($Arr[$x][0] ) < CardTranslate ($Arr[$y][0] ) )
         {
            //bytter kort 
            $s=$Arr[$x][0];
            $r=$Arr[$x][1];

            $Arr[$x][0]=$Arr[$y][0];
            $Arr[$x][1]=$Arr[$y][1];
 
            $Arr[$y][0]=$s;
            $Arr[$y][1]=$r;
         }
            
        }
      }


      for ($x = 0; $x <= count($Arr)-1; $x++) 
      {
               
          for ($y = 0; $y <= count($Arr)-1; $y++) 
          {
           //if(   $Arr[$x][0]   <  $Arr[$y][0]  )
           if (CardTranslate ($Arr[$x][0] ) == CardTranslate ($Arr[$y][0] ) )
           {
              
             
            
                 //if(   $Arr[$x][0]   <  $Arr[$y][0]  )
                 if (CardTranslateSuits ($Arr[$x][1] ) < CardTranslateSuits ($Arr[$y][1] ) )
                 {
                    //bytter kort med samme rank
                    $s=$Arr[$x][0];
                    $r=$Arr[$x][1];
        
                    $Arr[$x][0]=$Arr[$y][0];
                    $Arr[$x][1]=$Arr[$y][1];
         
                    $Arr[$y][0]=$s;
                    $Arr[$y][1]=$r;
                 }
                    
            



           }
              
          }
        }
    




   return $Arr;
}

echo"UnSorted Hand:";

?>
<?
//læser usorteret Hand
$handUnsorted = dealCard($Deck,5);
for ($x = 0; $x <= count($handUnsorted)-1; $x++) {
        
    echo Cardstostring($handUnsorted, $x);
  }
?>


<?
echo"Sorted Hand:";
?>
<?
//læser sorteret Hand
$handSorted = sortCards($handUnsorted);

for ($x = 0; $x <= count($handSorted)-1; $x++) {
        
    echo Cardstostring($handSorted, $x);
  }
?>


<?
echo"D)"

?>

<?
$Player1=array();
$Player2=array();
$PileA=array();
$PileB=array();

//program som deler kort ud i to bunker 
for ($x = 0; $x <= count($Deck)-1; $x++) 
{
 switch ($Deck[$x][1])
  {
     case"clubs":
        
        switch ($Deck[$x][0])
        {  
        case"2":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);

            array_push($PileA,$TempDeck);
            break;
        case"4":
         
             $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
    
             array_push($PileA,$TempDeck);
            break;
         case"6":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
       
            array_push($PileA,$TempDeck);
            break;
            
        case"8":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
           
            array_push($PileA,$TempDeck);
            break;
        case"10":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
           
             array_push($PileA,$TempDeck);
             break; 
        case"Queen":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
           
             array_push($PileA,$TempDeck);
            break; 
        case"Ace":
         
             $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
                   
            array_push($PileA,$TempDeck);
            break;  

        default: 
        $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
   
        array_push($PileB,$TempDeck);
        }                           
     break;

     case"diamonds":
               
               if ($Deck[$x][0]<="7")
                 {
                    $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
                    array_push($PileA,$TempDeck);
                 }
                else
                {
                    $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
       
                    array_push($PileB,$TempDeck);
                }
              
        

       
     break;


     case"spades":
        switch ($Deck[$x][0])
        {  
        case"5":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
           
            array_push($PileA,$TempDeck);
            break;

        case"7":
         
             $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
               
            array_push($PileA,$TempDeck);
            break;

        case"9":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
               
            array_push($PileA,$TempDeck);
            break;    

        default: 
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
       
            array_push($PileB,$TempDeck);

        }
     break;

     case"hearts":
        switch ($Deck[$x][0])
        {  
        case"10":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);

            array_push($PileA,$TempDeck);
            break;
        case"Jack":
         
             $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
    
             array_push($PileA,$TempDeck);
            break;
         case"Queen":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
       
            array_push($PileA,$TempDeck);
            break;
        case"King":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
           
            array_push($PileA,$TempDeck);
            break;
        case"Ace":
         
            $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
               
            array_push($PileA,$TempDeck);
        break;

        default: 
        $TempDeck = array($Deck[$x][0],$Deck[$x][1]);
   
        array_push($PileB,$TempDeck);
         }
        
         

        
     break;

   




  }
}
//læser pileA
echo"PileA:";
 for ($x = 0; $x <= count($PileA)-1; $x++) {
    
    echo Cardstostring($PileA, $x);
    
  }
  ?>




<?
//læser pileB 
echo"PileB:";
for ($x = 0; $x <= count($PileB)-1; $x++) {
   
    echo Cardstostring($PileB, $x);
  }
  
?>


<?
//Player 1 får 5 kort og bliver sorteret og aflæst
$Player1 = dealCard($PileA,5);
sortCards($Player1);
echo"Player1:";
for ($x = 0; $x <= count($Player1)-1; $x++) {
   
    echo Cardstostring($Player1, $x);
  }
  
?>


<?
//Player 2 får 5 kort og bliver sorteret og aflæst
$Player2 = dealCard($PileB,5);
sortCards($Player2);
echo"player2:";
for ($x = 0; $x <= count($Player2)-1; $x++) {
   
    echo Cardstostring($Player2, $x);
  }
  
?>


<?
echo"Opgave 5"
?>

<?
echo "A)"
?>


<?
$p1 = ['Albert', [],' '];
$p2 = ['Benny', [],' '];
$p3 = ['Carl', [],' '];
global $test;
$test=array("1","2","3");

//players bliver aflæst med foreach loop
$players = [$p1, $p2, $p3];
echo "Players Foreach Loop:";
foreach ( $players as $value) 
  {
    echo $value[0],"-";
  };
  ?>

  <?
  ?>
  
<?
//players bliver aflæst med for loop
echo "Players For Loop:";
for ($x = 0; $x <= count($players)-1; $x++) 
 {

    echo $players[$x][0],"-";
    
}
?>


<?
echo "B)"
?>

<?
//dealCardsToPlayers funktion
function dealCardsToPlayers($value)
{
    global $Deck;
    global $players;
    
    


    //$players[0][1] = 

    for ($z = 0; $z <= count($players)-1; $z++) 
    {
   
        for ($x = 0; $x <= $value-1; $x++)
        {
           
           $Temphand = array($Deck[(($z)*$value+$x)][0],$Deck[$x][1]);
    
            array_push($players[$z][1],$Temphand);
            
       }
       
   }
    
   
  

}

dealCardsToPlayers(5);
//de tre player for hver 5 kort og bliver aflæst
for ($z = 0; $z <= count($players)-1; $z++) 
{
    ?>

    <?
    echo  $players[$z][0];
      echo ":  ";
    for ($x = 0; $x <= count($players[$z][1])-1; $x++) {
        
        
      echo  Cardstostring($players[$z][1],$x);
       
    }  
  
}

/*
for ($x = 0; $x <= count($players[0][1])-1; $x++) 
 {

    echo $players[$x][0][1],"-";
    
}
*/





?>


<?
echo"C)"
?>
<?
for($z = 0; $z <= count($players)-1; $z++)
 {
    $players[$z][1] = sortCards($players[$z][1]);
 }

for ($z = 0; $z <= count($players)-1; $z++) 
{
    ?>

    <?
    echo  $players[$z][0];
      echo ":  ";
    for ($x = 0; $x <= count($players[$z][1])-1; $x++) {
        
        
      echo  Cardstostring($players[$z][1],$x);
       
    }  
  
}
?>

