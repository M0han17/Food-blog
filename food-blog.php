
<!DOCTYPE html>
<html lang="en">

<!---This code validates Login--->
<?php require_once("login_signup/config.php");
if(isset($_SESSION["login_sess"])) 
{
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
}
}
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS from Materialized-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript from Materialized-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


     <!--Import Google Icon Font from Materialized-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="food-blog.css" rel="stylesheet">


    <title>FoodNinjas - A Blog With Real Ninja Recipes</title>

</head>
<body>

    <!--nav bar-->
    <header>
        <div class="navbar-fixed scrollspy" id="nav-bar">
            <nav class="nav-wrapper black ">
            <div class="container">
                <a href="#about-project" class="waves-effect waves-light btn modal-trigger indigo" id="project-info">
                    <span>About Project</span>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#food-gallery" class="">Food Gallery</a></li>
                    <li><a href="#recipes" class="">Recipes</a></li>
                    <li><a href="#footer" class="">Post Recipes</a></li>
                </ul>
                <?php 
                require_once("login_signup/config.php");
                if(!isset($_SESSION["login_sess"])) 
                {
                    echo '<a href="login_signup/signup.php" class="waves-effect waves-light btn  indigo" id="form-b">sign up</a>';
                }
                else{
                    echo '<a href="#login-info" class=" btn modal-trigger transparent" style="position:absolute;right:9%;top:6px;"><i class="material-icons" >account_circle</i></a>
                    <a href="login_signup/logout.php" class="waves-effect waves-light btn red darken-4" id="form-b">log out</a>';
                }
                ?>
                <a href="#nav-bar" class="brand-logo ">Food Ninjas</a>
            </div>
        </nav>
    </div>
    </header>


    <!-- Modal About Project -->
    <div id="about-project" class="modal">
        <div class="modal-content">
          <h4 class="indigo-text">Project Info</h4>
          <p>This is a just a simple project made by the college students for thier assesment grades. And most of the images used in this project does not entitle copyrights&copy;, and belong to their respective owners.  </p>
          <p>And this project makes use of Google's MATERIALIZE freameworks for most the CSS styling and also makes use of MATERIALIZE jQuery libraries for creating JavaScript responses.</p>
          <p>IMPORTANT NOTE: In order for the sign-up and the registeration page to work, you have to create a SQL Database named 'FoodBlogDb' in your local hosting system. More details is in the report.</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK, got it</a>
        </div>
        </div>

        <!-- Modal Login Info -->
    <div id="login-info" class="modal">
        <div class="modal-content container">
                
        <form action="login_process.php" method="POST">
  <div class="login_form"><br> 
          <p> Hey Ninja, <span style="color:indigo"><?php echo " $fname $lname"; ?></span>. Welcome!!</p>
          <table class="table">
          <tr>
              <th>First Name </th>
              <td><?php echo $fname; ?></td>
          </tr>
          <tr>
              <th>Last Name </th>
              <td><?php echo $lname; ?></td>
          </tr>
          <tr>
              <th>Username </th>
              <td><?php echo $username; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $email; ?></td>
          </tr>
          </table>
        </div>
    
        </div>

         <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">OK</a>
        </div>
        </div>


  <!--Food Gallery-->
  <section class="container section scrollspy" id="food-gallery">
      <h2 class="center-align indigo-text text-darken-4">FoodNinjas Food Gallery!</h2>
      <pre>

      </pre>
      <div class="row">
        <div class="col s12 l3 "> 
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2020/11/pizza-toast-5468.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4" style="position: relative;left: 15%;" >Japanese Pizza Toast</h7>
        </div>
        <div class="col s12 l3 offset-l1">
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2020/09/oreo-mug-cake-6121w.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4 center-align" style="position: relative;left: 20%;"  >Oreo Mug Cake</h7>
        </div>
        <div class="col s12 l3 offset-l1 ">
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2020/11/bbh-noodles-7903w.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4" style="position: relative;left: 5%;"  >Spicy Noodles: Vietnamese Garlic Edition</h7>
        </div>
      </div>
      <pre>

      </pre>
    <div class="row">
        <div class="col s12 l5 ">
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2020/10/hot-chocolate-bombs-7604w-2.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4" style="position: relative;left: 20%;"  >Tik-tok Hot Chocolate Bombs</h7>
        </div>
        <div class="col s12 l5 offset-l1 ">
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2017/05/menchikatsu-burger-4689w.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4" style="position: relative;left: 20%;" >Turkey Menchi Katsu Burger</h7>
        </div>
      </div><pre> 
      
      </pre>

      <div class="row">
        <div class="col s12 l3 "> 
            <img src="https://images.unsplash.com/photo-1521483632781-413ac2a35ee6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4" style="position: relative;left: 15%;" >Manhattan Cocktail</h7>
        </div>
        <div class="col s12 l3 offset-l1">
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2019/02/japanese-fluffy-pancakes-recipe-7077w-2.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4 center-align" style="position: relative;left: 25%;"  >Dora Cakes</h7>
        </div>
        <div class="col s12 l3 offset-l1 ">
            <img src="https://iamafoodblog.b-cdn.net/wp-content/uploads/2020/05/homemade-birria-tacos-recipe-3273w.jpg" alt="" class="responsive-img materialboxed" >
            <h7 class="indigo-text text-darken-4" style="position: relative;left: 30%;"  >Birria Tacos</h7>
        </div>
      </div>
      <pre>

  </section>


<!-- parallax -->
<div class="parallax-container">
    <div class="parallax">
        <img src="https://images.unsplash.com/photo-1605807646983-377bc5a76493?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1824&q=80" class="responsive-img">
    </div>
</div>


    <!--recipe into-->
    <h2 class="center-align indigo-text text-darken-4  scrollspy" id="recipes">FoodNinjas Recipes!</h2><br>
    <div class="container">
    <h4>Let's talk food only:)</h4>
    <p><b>Welcome to FoodNinjas recipe Section.</b> Here are few recipes to lighten up the mood. Quick and easy old school recipes, wonderful tasty dishes whose flavour will leave you wanting for more. Now here we present few of the delactable recipes, go ahead and enjoy your time as your prepare them and most importantly don't forget to enjoy the flavour of the food as you savour them. As a matter of fact you will, and that's a promise :)</p>
    </div>


    <!--Orea grid-->
    <section class="container section " >
        <div class="row">
            <div class="col s12 l4 ">
                <img src="https://pinchofyum.com/wp-content/uploads/Homemade-Oreos-3.jpg" alt="" class="responsive-img materialboxed" >
            </div>
            <div class="print-oreo col s12 l6 offset-l1">
                <h5 class="indigo-text text-darken-4 ">1. Old school homemade Oreos</h5>
                <p>Hello! Let’s talk about something that is charmingly old school and also VERY DANGEROUSLY DELICIOUS:<br/><br/>
                Homemade Oreos.</p>

                <p>This is important to say right off the bat: there’s no crunchy cookie and no dry frosting here. We’re just borrowing the concept of all Oreo layering but swapping the dry stuff for a soft, buttery, moist, perfectly dense little chocolate cookie stuffed with cream cheese frosting. Oh my word they’re so good. They’re an easy holiday baking win, giftable, party-able, and a total gift to humanity.
                    Give me a soft, moist, cakey-meets-fudgy-meets-cream-cheese-frosting situation over a dry cookie any day. Or every day.</p>
            </div>
        </div>
    </section>
    <!--tab-->
    <section class="section container" >
        <div class="row">
          <div class="col s12 l12 ">
            <!-- tabs -->
            <ul class="tabs">
              <li class="tab col s3">
                <a href="#oreo-ingridients" class="active indigo-text ">ingridients</a>
              </li>
              <li class="tab col s3">
                <a href="#oreo-recipe" class="indigo-text ">Recipe</a>
              </li>
              <li class="tab col s3">
                <a href="#oreo-video" class="indigo-text ">Video</a>
              </li>
              <li class="tab col s3">
                <a href="#oreo-questions" class="indigo-text ">Questions</a>
              </li>
            </ul>
            <div id="oreo-ingridients" class="print-oreo col s12">
                <p class="flow-text indigo-text text-darken-4">INGRIDIENTS</p>
                <h5>Cookies:</h5>
                <ul class="a">
                    <li>2 eggs</li>
                    <li>3/4 cup butter, room temperature</li>
                    <li>1/2 teaspoon vanilla</li>
                    <li>1 box Devil’s Food cake mix</li>
                </ul>
                <h5>Frosting:</h5>
                <ul class="a">
                    <li>8 oz.cream cheese</li>
                    <li>1/2 cup butter</li>
                    <li>1 tsp vanilla</li>
                    <li>2 cups powered sugar</li>
                </ul>
            </div>
            <div id="oreo-recipe" class="print-oreo col s12">
                <p class="flow-text indigo-text text-darken-4">INSTRUCTIONS</p>
                <ol >
                    <li>Beat cookie ingredients together with an electric mixer until combined. </li>
                    <li>Preheat the oven to 350 degrees. Roll into small one or two tablespoon balls. Place on a baking sheet. (Chill the dough for about 30 minutes if it’s too soft to roll.)</li>
                    <li>Bake for 8 minutes. Remove and allow to cool.</li>
                    <li>Beat frosting ingredients together with an electric mixer. Using a plastic bag with the end cut off, or a pastry bag, pipe a swirl of frosting onto one cookie and gently press a same-size cookie on top. Voila! Store in the refrigerator – or on  your cold porch if you live in Minnesota!</li>
                </ol>
            </div>
            <div id="oreo-questions" class="col s12">
                <p class="flow-text indigo-text text-darken-4">FREQUENTLY ASKED QUESTIONS ON HOMEMADE OREOS</p>
                <h5>How do I serve these?</h5>
                    <p>You can serve these at room temperature for a softer cookie or straight from the fridge for a more dense cookie.</p>
                <h5>I can’t find Devil’s Food cake mix. What can I use instead?</h5>
                    <p>Any brand of boxed chocolate cake mix should work as a substitute</p>
                <h5>Do these freeze well?</h5>
                    <p>The cookies will freeze well, but we’d recommend making the frosting fresh.</p>
            </div>
            <div id="oreo-video" class="col s12">
                <p class="flow-text indigo-text text-darken-4">Are the Instructions still not clear?</p>
                <p>A video might help:)</p>
                <div class="container "><iframe width="560" height="315" src="https://www.youtube.com/embed/9v2Gci1hnqE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
            </div>
          </div>
        </section>

        <button  class="waves-effect waves-light btn indigo" id="b-oreo" type="reset" style="position: relative; left: 16%;">Print Recipe<i class="material-icons right">print</i></button>
              
        <pre> </pre>


        <!-- parallax -->
<div class="parallax-container">
    <div class="parallax">
        <img src="https://i.postimg.cc/GtPYfkWv/douglas-lopez-t3-GIIBhkw-Z8-unsplash.jpg" class="responsive-img">
    </div>
</div>
    

    <!--Spicy tofu Burger grid-->
    <section class="container section " >
        <div class="row">
            <div class="col s12 l4 push-l6 offset-l1">
                <img src="https://pinchofyum.com/wp-content/uploads/Tofu-Burgers-Square.jpg" class="responsive-img materialboxed" >
            </div>
            <div class="print-tofu col s12 l6  pull-l5">
                <h5 class="indigo-text text-darken-4 ">2.Spicy tofu Burger</h5>
                <p>Ow owwwwwww! It looks so good!</p>

                <p>This might be my bigger summer surprise recipe yet: the fact that tofu, crumbled and pressed together with lemongrass, sriracha, mint, cilantro, and basil, and browned up into a delicious, flavor-bomb burger served on a toasted brioche bun with spicy mayo and some delicately sliced fresh veggies can, in fact, be ONE OF MY FAVORITE BURGERS that I’ve ever made.</p>

                <p>And that’s saying a lot because I love a lot of burgers (wild rice burgers! cauliflower burgers! salmon burgers!).</p>
                <p>But specifically in this case, when I say burger I actually mean VEGAN burger, because remember that the base of this beast is a block of humble tofu. I know. I’m as shocked as you are.</p>

            </div>
        </div>
    </section>
    <!--tab-->
    <section class="section container scrollspy" id="services">
        <div class="row">
          <div class="col s12 l12 ">
            <!-- tabs -->
            <ul class="tabs">
              <li class="tab col s3">
                <a href="#tofu-ingridients" class="active indigo-text ">ingridients</a>
              </li>
              <li class="tab col s3">
                <a href="#tofu-recipe" class="indigo-text ">Recipe</a>
              </li>
              <li class="tab col s3">
                <a href="#tofu-video" class="indigo-text ">Video</a>
              </li>
              <li class="tab col s3">
                <a href="#tofu-questions" class="indigo-text ">Questions</a>
              </li>
            </ul>
            <div id="tofu-ingridients" class="print-tofu col s12">
                <p class="flow-text indigo-text text-darken-4">INGRIDIENTS</p>
                <h5>Burgers:</h5>
                <ul class="a">
                    <li>1 block extra firm tofu</li>
                    <li>2 tablespoons tomato paste</li>
                    <li>1–2 tablespoons sriracha (for medium or hot, add more sriracha)</li>
                    <li>2 tablespoons fresh mint, chopped</li>
                    <li>2 tablespoons fresh basil, chopped</li>
                    <li>1/4 cup fresh cilantro, chopped</li>
                    <li>1 shallot, very finely minced</li>
                    <li>1 tablespoon lemongrass paste</li>
                    <li>5 tablespoons all purpose flour</li>
                    <li>1 teaspoon salt</li>
                </ul>
                <h5>Burger Toppings:</h5>
                <ul class="a">
                    <li>buns(toasted,please)</li>
                    <li>sriracha</li>
                    <li>mayo</li>
                    <li>carrots</li>
                    <li>bell peppers</li>
                    <li>more herbs</li>
                </ul>
            </div>
            <div id="tofu-recipe" class="print-tofu col s12">
                <p class="flow-text indigo-text text-darken-4">INSTRUCTIONS</p>
                <ol >
                    <li>Press the water out of your tofu using a tofu press or just laying a heavy pan on top of it for 20-30 minutes.</li>
                    <li>Mash the tofu using your hands or a spoon until it’s crumbly. Mix in the remaining burger ingredients. Form into 4 patties. </li>
                    <li>Preheat the oven to 350 degrees. Fry the burgers in a skillet with a little bit of olive oil first to get the outsides nice and browned. Then transfer to the oven and bake for 20-or-so minutes, until the burgers are firm to the touch on the outside. (You can throw some peppers or onions in the pan with the burgers if you want to cook them up at the same time.)</li>
                    <li>Serve on toasted buns with sriracha, mayo, and fresh veggies and herbs (bonus points if you make quick pickled veggies because YUMMM).</li>
                </ol>
            </div>
            <div id="tofu-questions" class="col s12">
                <p class="flow-text indigo-text text-darken-4">FREQUENTLY ASKED QUESTIONS ON TOFU BURGERS</p>
                <h5>What’s the texture like?</h5>
                    <p>In general, these burgers are softer than a regular burger, especially on the insides. Step 1 in the recipe is important so the burgers don’t get overly mushy. That being said, they will taste great even if you don’t have time for it – I have made versions where I just open the package and squeeze as much water as I can out, and honestly I’ve loved every bite. Just know that the burger texture will be slightly heavier and wetter if you skip that first step.</p>
                <h5>Can I make this gluten-free?</h5>
                    <p>For a gluten free version, use a gluten free flour – Gaz actually recommends buckwheat flour in his cookbook.</p>
                <h5>How spicy are these burgers?</h5>
                    <p>I felt like with 1 tablespoon of sriracha in the whole thing, it was still pretty mild and worked okay for our toddler. Once you get into the 2 or 3 tablespoons of sriracha zone, it’s going to be more of a medium / + level spice.</p>
            </div>
            <div id="tofu-video" class="col s12">
                <p class="flow-text indigo-text text-darken-4">Are the Instructions still not clear?</p>
                <p>A video might help:)</p>
                <div class="container"><iframe width="560" height="315" src="https://www.youtube.com/embed/Yk1QHbuLfkk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
            </div>
          </div>
        </section>
        <button  class="waves-effect waves-light btn indigo" id="b-tofu" type="reset" style="position: relative; left: 16%;">Print Recipe<i class="material-icons right">print</i></button>
        <pre>
        
         </pre>

        <!-- parallax -->
        <div class="parallax-container">
            <div class="parallax">
                <img src="https://images.unsplash.com/photo-1604845933140-4ea8c0a56d7a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1950&q=80" class="responsive-img">
            </div>
        </div>



        <!--coffee grid-->
    <section class="container section " >
        <div class="row">
            <div class="col s12 l4 ">
                <img src="https://images.unsplash.com/photo-1590299163935-d5ace99139d2?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=934&q=80" alt="" class="responsive-img materialboxed" >
            </div>
            <div class="print-coffee col s12 l6 offset-l1">
                <h5 class="indigo-text text-darken-4 ">3. Dalgona Coffee</h5>
                <p>Dalgona coffee—it started as a Tik Tok trend and has now exploded all over the internet as the It-Drink of the moment. Is it worth the hype? Only one way to find out.</p>

                <p>If you've got instant coffee, sugar, and water on hand, you can make this. It'll go by faster if you have a hand mixer, but a humble regular whisk, one powerful arm, and a good dose of patience and endurance will get you there too—just make sure you're ready to feel the burn in your triceps and biceps and you'll be rewarded with a nice tall glass of cold, creamy coffee that's sweetened just right. Depending on how much of a caffeine rush you want, this recipe makes enough dalgona fluff for one or two servings. It's delicious but very strong: drink at your own discretion!</p>
            </div>
        </div>
    </section>
    <!--tab-->
    <section class="section container" >
        <div class="row">
          <div class="col s12 l12 ">
            <!-- tabs -->
            <ul class="tabs">
              <li class="tab col s3">
                <a href="#coffee-ingridients" class="active indigo-text ">ingridients</a>
              </li>
              <li class="tab col s3">
                <a href="#coffee-recipe" class="indigo-text ">Recipe</a>
              </li>
              <li class="tab col s3">
                <a href="#coffee-video" class="indigo-text ">Video</a>
              </li>
              <li class="tab col s3">
                <a href="#coffee-questions" class="indigo-text ">Questions</a>
              </li>
            </ul>
            <div id="coffee-ingridients" class="print-coffee col s12">
                <p class="flow-text indigo-text text-darken-4">INGRIDIENTS</p>
                <h5>Cookies:</h5>
                <ul class="a">
                    <li>2 tbsp. granulated sugar</li>
                    <li>2 tbsp. instant coffee </li>
                    <li>2 tbsp. cold water</li>
                    <li>Ice, for serving</li>
                    <li>Milk, for serving</li>
                </ul>
            </div>
            <div id="coffee-recipe" class="print-coffee col s12">
                <p class="flow-text indigo-text text-darken-4">INSTRUCTIONS</p>
                <ol >
                    <li>In a medium bowl, combine sugar, coffee, and water. Using a hand mixer or a whisk, vigorously whisk until mixture turns silky smooth and shiny, then continue whisking until it thickens and holds its lofty, foamy shape. (If whisking by hand, it will take 8 to 12 minutes to get to optimal fluffiness.)</li>
                    <li>Fill a glass most of the way full with ice and milk, then dollop and swirl the whipped coffee mixture on top, mixing before drinking, if desired.</li>
                </ol>
            </div>
            <div id="coffee-questions" class="col s12">
                <p class="flow-text indigo-text text-darken-4">FREQUENTLY ASKED QUESTIONS ON DALGONA COFFEE</p>
                <h5>How did Dalgona coffee get its name?</h5>
                    <p>The name is derived from dalgona, a Korean sugar sweet, due to the resemblance in taste and appearance, though most dalgona coffee doesn't actually contain dalgona.
                    </p>
                <h5>What makes Dalgona coffee Fluffy?</h5>
                    <p>Sugar plays a crucial role in making the super fluffy foam. Even though the surfactants in coffee serve well to help stabilize bubbles while you're foaming the liquid, they aren't strong enough to maintain the foam. Instead, gravity will pull the liquid down, air bubbles float up and air bubbles merge together.</p>
            </div>
            <div id="coffee-video" class="col s12">
                <p class="flow-text indigo-text text-darken-4">Are the Instructions still not clear?</p>
                <p>A video might help:)</p>
                <div class="container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/9SjCEOWd3PU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
      </div>
        
    </section>
    <button  class="waves-effect waves-light btn indigo" id="b-coffee" type="reset" style="position: relative; left: 16%;">Print Recipe<i class="material-icons right">print</i></button>

     <pre>   </pre>


    <!-- parallax -->
    <div class="parallax-container">
        <div class="parallax">
            <img src="https://images.unsplash.com/photo-1506224988854-3f6992c9334d?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1950&q=80" class="responsive-img">
        </div>
    </div>

    <!--share recipes-->

    <section class="container section " >
        <div class="row">
            <div class="col s12 l4 push-l6 offset-l1">
                <img src="ninja.svg" class="responsive-img materialboxed" ><br>
                <a  class="waves-effect waves-light btn indigo" href="share_recipes/index.php" style="position: relative; left: 16%;">Post Recipes<i class="material-icons right">share</i></a>
            </div>
            <div class="col s12 l6  pull-l5">
                <h5 class="indigo-text text-darken-4 ">Hey Ninjas,</h5>
                <p>Time to get into real action and share some of your own food recipes. The form is open to anyone and all we ask is an email address for validation. So, feel free to post your recipes. </p>
                <p>See you untill next time ninjas! </p>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="pagr-footer grey darken-3 scrollspy" id="footer">
        <div class="container white-text">
            <div class="row">
                <div class="col s12 l6">
                    <h5>About The Project</h5>
                    <p>FoodNinjas is just a mini food blog created by the students of B.M.S College of engineering, Bangalore.</p>
                 <p>This is just a small project created for Web devolopment lab examination held on January 2021. And anybody can make use this code for any educational purposes, we would be very happy that we could be of some help :)</p>
                 <p>Thank You.</p>
                </div>
                <div class=" container col s12 l5 offset-l1">
                    <h5>About Us</h5>
                    <ul>
                            <li><b>Moksh Jayanth GR</b></li>
                            <li><i class="material-icons left">e_mail</i><span> mokshgr.is19@bmsce.ac.in</span></li>
                            <br/>
                            <li><b>Mohan D</b></li>
                            <li><i class="material-icons left">e_mail</i><span> mohand.is19@bmsce.ac.in</span></li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="footer-copyright grey darken-4 white-text ">
        <div class="container center-align">&copy; 2021 Food Ninjas</div>
    </div>
    </footer>

    <script>
        $(document).ready(function(){
            $('.parallax').parallax();
            $('.materialboxed').materialbox();
            $('.tabs').tabs();
            $('.scrollspy').scrollSpy();
            $('.modal').modal();
        });
    </script>

    <!---PRINT RECIPES--->

<script>
        function validateOreo(){
            <?php 
            require_once("login_signup/config.php");
            if(!isset($_SESSION["login_sess"])) { ?>
            if(confirm("You have to login inorder to print the recipe.\n Do you want to login?")){window.location.href="login_signup/login.php";}
            <?php } else {?> printOreo(); <?php } ?>
        }
        document.getElementById("b-oreo").addEventListener("click", validateOreo);
        </script>

<script type="text/javascript">     
            function printOreo()
            {
                var divsToPrint = document.getElementsByClassName('print-oreo'),n;
                var printContents = "";
                for (n = 0; n < divsToPrint.length; n++) 
                {
                printContents += divsToPrint[n].innerHTML+"<br>";
                }
                var newWin= window.open('', 'win');
                newWin.document.write(printContents);
                newWin.location.reload();
                newWin.focus();
                newWin.print();
                newWin.close();
            }
</script>

<script>
        function validateTofu(){
            <?php 
            require_once("login_signup/config.php");
            if(!isset($_SESSION["login_sess"])) { ?>
            if(confirm("You have to login inorder to print the recipe.\n Do you want to login?")){window.location.href="login_signup/login.php";}
            <?php } else {?> printTofu(); <?php } ?>
        }
        document.getElementById("b-tofu").addEventListener("click", validateTofu);
        </script>

<script type="text/javascript">     
            function printTofu()
            {
                var divsToPrint = document.getElementsByClassName('print-tofu'),n;
                var printContents = "";
                for (n = 0; n < divsToPrint.length; n++) 
                {
                printContents += divsToPrint[n].innerHTML+"<br>";
                }
                var newWin= window.open('', 'win');
                newWin.document.write(printContents);
                newWin.location.reload();
                newWin.focus();
                newWin.print();
                newWin.close();
            }
</script>

<script>
        function validateCoffee(){
            <?php 
            require_once("login_signup/config.php");
            if(!isset($_SESSION["login_sess"])) { ?>
            if(confirm("You have to login inorder to print the recipe.\n Do you want to login?")){window.location.href="login_signup/login.php";}
            <?php } else {?> printCoffee(); <?php } ?>
        }
        document.getElementById("b-coffee").addEventListener("click", validateCoffee);
        </script>

<script type="text/javascript">     
            function printCoffee()
            {
                var divsToPrint = document.getElementsByClassName('print-coffee'),n;
                var printContents = "";
                for (n = 0; n < divsToPrint.length; n++) 
                {
                printContents += divsToPrint[n].innerHTML+"<br>";
                }
                var newWin= window.open('', 'win');
                newWin.document.write(printContents);
                newWin.location.reload();
                newWin.focus();
                newWin.print();
                newWin.close();
            }
</script>

</body>
</html>