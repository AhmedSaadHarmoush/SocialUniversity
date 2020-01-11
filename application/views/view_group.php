<html>
<head>
        <title> Usci - <?php echo $_SESSION['user_data']['username'];?></title>
        <link rel="shortcut icon" href="<?= base_url()?>img/logo.png">
        <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
        <script src="<?php echo base_url();?>js/script.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/dropzone.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript"></script>
        <style>
            .active{
                z-index: 0 ;  
            }
            .sidebar{
                z-index: 9999;
            }
            .progress-bar{
                background: #30CBBC;
            }
            .nav{
                width: 90%;
            }
            .tab-pane{
                min-height: 100px;
            }
        </style>
        <script  language="javascript">
           // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
                    var previewNode = document.querySelector("#template");
                    previewNode.id = "";
                    var previewTemplate = previewNode.parentNode.innerHTML;
                    previewNode.parentNode.removeChild(previewNode);

                    var myDropzone = new Dropzone(document.tab-pane, { // Make the whole body a dropzone
                      url: "/target-url", // Set the url
                      thumbnailWidth: 80,
                      thumbnailHeight: 80,
                      parallelUploads: 20,
                      previewTemplate: previewTemplate,
                      autoQueue: false, // Make sure the files aren't queued until manually added
                      previewsContainer: "#previews", // Define the container to display the previews
                      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
                    });

                    myDropzone.on("addedfile", function(file) {
                      // Hookup the start button
                      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
                    });

                    // Update the total progress bar
                    myDropzone.on("totaluploadprogress", function(progress) {
                      document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
                    });

                    myDropzone.on("sending", function(file) {
                      // Show the total progress bar when upload starts
                      document.querySelector("#total-progress").style.opacity = "1";
                      // And disable the start button
                      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
                    });

                    // Hide the total progress bar when nothing's uploading anymore
                    myDropzone.on("queuecomplete", function(progress) {
                      document.querySelector("#total-progress").style.opacity = "0";
                    });

                    // Setup the buttons for all transfers
                    // The "add files" button doesn't need to be setup because the config
                    // `clickable` has already been specified.
                    document.querySelector("#actions .start").onclick = function() {
                      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
                    };
                    document.querySelector("#actions .cancel").onclick = function() {
                      myDropzone.removeAllFiles(true);
                    };
            var counter;
            counter=0;
            function quiz(){
                counter++;
                $( "#quiz" ).append( "<div role='tabpanel' class='tab-pane' id='quiz'>"
                                   +" <div role='tabpanel'>"
                                    +"<ul class='nav nav-tabs' role='tablist'>"
                                     +" <li role='presentation' class='active'><a href='#qa"+counter+"' aria-controls='qa' role='tab' data-toggle='tab'>QA</a></li>"
                                      +"<li role='presentation'><a href='#tf"+counter+"' aria-controls='tf' role='tab' data-toggle='tab'>TF</a></li>"
                                     +" <li role='presentation'><a href='#mcq"+counter+"' aria-controls='mcq' role='tab' data-toggle='tab'>MCQ</a></li>"
                                    +"</ul>"
                                    +"<input type='hidden' value='"+counter+"'>"
                                        +"<div class='tab-content'>"
                                      +"<div role='tabpanel' class='tab-pane active' id='qa"+counter+"'>"
                                         +" <h3 class='post-title'>Write your question here!!</h3>"
                                          +"<textarea class='post-txt input'></textarea><br>"
                                          +"<button onclick='quiz()' class='btn floatRight'>NewQuiz</button>"
                                          +"<div style='clear:both'></div>"
                                      +"</div>"
                                      +"<div role='tabpanel' class='tab-pane' id='tf"+counter+"'>"
                                          +"<h3 class='post-title'>Write your question here!!</h3>"
                                          +"<textarea class='post-txt input'></textarea><br>"
                                          +"<input type='radio' class='radioo' name='art'>TRUE"
                                          +"<input type='radio' class='radioo ' name='art' checked>FALSE"
                                          +"<button onclick='quiz()' class='btn floatRight'>NewQuiz</button>"
                                          +"<div style='clear:both'></div>"
                                      +"</div>"
                                      +"<div role='tabpanel' class='tab-pane' id='mcq"+counter+"'>"
                                          +"<h3 class='post-title'>Write your question here!!</h3>"
                                          +"<textarea class='post-txt input'></textarea><br>"
                                          
                                          +"<input type='text'  class='input block sideInput' placeholder='First answer'>"
                                          +"<input type='radio' class='radioo ' name='art' checked><div style='clear:both'></div>"
                                                    +"<input type='text' class='input block sideInput' placeholder='Second answer'>"
                                        +"<input type='radio' class='radioo' name='art'><div style='clear:both'></div>"
                                    +"<input type='text' class='input block sideInput' placeholder='Third answer'>"
                                    +"<input type='radio' class='radioo' name='art'><div style='clear:both'></div>"
                                                +"<input type='text' class='input block sideInput' placeholder='Fourth answer'>"
                                                +"<input type='radio' class='radioo' name='art'><div style='clear:both'></div>"
                                                +"<button onclick='quiz()' class='btn floatRight'>NewQuiz</button>"
                                          +"<div style='clear:both'></div>"
                                      +"</div>"
                                    +"</div>");
            }
            
        </script>
    </head>
<body>
         <aside class="sidebar">
            <center>
                <div class="prof-pic section">
                    <div class="prof-pic-img header_logo">
                        <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!--progile-picture-->
                    </div>
                    <div class="cheack"><i class="icon-check-mark"></i></div>
                    <h3 class="prof-name"><?php echo $_SESSION['user_data']['username'];?></h3><!--user-name-->
                </div>
            </center>
                
                <div class="info section">
                    <h3 class="side-title">About</h3>
                    <ul>
                        <li><i class="icon-right-open"></i><span>CGPA </span> 3.05</li>
                        <li><i class="icon-right-open"></i>Computer science</li>
                        <li><i class="icon-right-open"></i>53 <span>Hours</span></li>
                    </ul><!--user-information-->
                </div>
            
                <div class="group section">
                    <i class="icon-folder3"></i><h3 class="side-title">Groupes</h3>
                    <div class="group-container">
                        <ul>
                            <li><a href="#">Theory Of Computation | cs220</a></li><!--group-item-->
                            <li><a href="#">Graphics | cs402</a></li>
                            <li><a href="#">C++ | cs201</a></li>
                            <li><a href="#">Java | cs202</a></li>
                        </ul><!--user-groupes-->
                    </div>
                </div>
            
                <div class="feeds section">
                    <h3 class="side-title">New feeds</h3>
                    <div class="fends-container">
                        <!--notification-items-->
                        <li>
                            <i class="icon-bell-1"></i>
                            <p><span>mohamed</span> just posted in theroy of compitiotn </p>
                            <div style="clear:both"></div>
                        </li>
                        <!--end-of-notification-item-->
                        <li>
                            <i class="icon-bell-1"></i>
                            <p><span>mimo</span> posted in Graphics at 2:00 am </p>
                            <div style="clear:both"></div>
                        </li>
                        <li>
                            <i class="icon-bell-1"></i>
                            <p><span>Dr.yasser</span> posted at java 3:23 pm </p>
                            <div style="clear:both"></div>
                        </li>
                        <li>
                            <i class="icon-bell-1"></i>
                            <p><span>Dr.yasser</span> posted at java 3:23 pm </p>
                            <div style="clear:both"></div>
                        </li>
                        <li>
                            <i class="icon-bell-1"></i>
                            <p><span>Dr.yasser</span> posted at java 3:23 pm </p>
                            <div style="clear:both"></div>
                        </li>
                    </div>
                </div>
             
             
             
              
        </aside>
    <div class="warpper">
            <!-----------------------------------usernav--------------------->
            <nav class="navs">
                
                
            <a class="floatRight mob-menu" href="#">
                   <i class="icon-menu"></i>
                </a> 
                <div class="collapse navbar-collapse" style="width: 90%;" id="bs-example-navbar-collapse-1">
                
                    <ul class="nav navbar-nav">
                    <li>
                                    <div >
                            <?php echo  anchor("/users", "Users", "class='btn'") ?>
                         </div>
                    </li>
                    <li>
                                <div >
                        <?php echo  anchor("/subjects", "Supjects", "class='btn'") ?>
                     </div>
                    </li>
                    <li>
                        <div >
                <?php echo  anchor("/departements", "Departements", "class='btn'") ?>
                     </div>
                    </li>
                    <li>
                        <div ><?php echo  anchor("/msg", "Masseges", "class='btn'") ?>
                     </div>
                    </li>
                    <li>
                        <div>
                        <?php echo  anchor("/posts", "posts", "class='btn'") ?>
                     </div>
                    </li>
                    <li>
                        <div>
                        <?php echo  anchor("/log/logout", "log out", "class='btn'") ?>
                     </div>
                    </li>
                    
                    
                </ul>
                 
                        
            </div>
                 
            </nav><!--end of user nav-->
            <?php if(isset($data))$this->load->view($data['template'],$data);?>
    
     <!--------------------------add post-------------->
            <div class="post-container">
                
                        <div role="tabpanel">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#post" aria-controls="post" role="tab" data-toggle="tab">Post</a></li>
                              <li role="presentation"><a href="#quiz" aria-controls="quiz" role="tab" data-toggle="tab">Quiz</a></li>
                              <li role="presentation"><a href="#file" aria-controls="file" role="tab" data-toggle="tab">File</a></li>
                              <li role="presentation"><a href="#session" aria-controls="session" role="tab" data-toggle="tab">Session</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="post">
                                            <div role="tabpanel">

                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                              <li role="presentation" class="active"><a href="#normalPost" aria-controls="normalPost" role="tab" data-toggle="tab">POST</a></li>
                                              <li role="presentation"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">Photo</a></li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                               <div role="tabpanel" class="tab-pane active" id="normalPost">
                                                    <h3 class="post-title">What's new</h3>
                                                    <textarea class="post-txt input"></textarea>
                                                    <input type="submit" class="btn floatRight" value="post">
                                                    <div style="clear:both"></div>
                                               </div>
                                              <div role="tabpanel" class="tab-pane" id="photo">
                                                  <form method="post" action="" class="dropzone" id="my-awesome-dropzone">
                                                            <div class="table table-striped" class="files" id="previews">
 
                                                                <div id="template" class="file-row">
                                                                  <!-- This is used as the file preview template -->
                                                                  <div>
                                                                      <span class="preview"><img data-dz-thumbnail /></span>
                                                                  </div>
                                                                  <div>
                                                                      <p class="name" data-dz-name></p>
                                                                      <strong class="error text-danger" data-dz-errormessage></strong>
                                                                  </div>
                                                                  <div>
                                                                      <p class="size" data-dz-size></p>
                                                                      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                                      </div>
                                                                  </div>
                                                                  <div>
                                                                    <button class="btn btn-primary start">
                                                                        <i class="glyphicon glyphicon-upload"></i>
                                                                        <span>Start Uploading</span>
                                                                    </button>
                                                                    <button data-dz-remove class="btn btn-warning cancel">
                                                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                                                        <span>Cancel</span>
                                                                    </button>
                                                                    <button data-dz-remove class="btn btn-danger delete">
                                                                      <i class="glyphicon glyphicon-trash"></i>
                                                                      <span>Delete</span>
                                                                    </button>
                                                                  </div>
                                                                </div>

                                                              </div>
                                                  </form>
                                              </div>
                                            </div>

                                          </div>
                                    
                            </div>
                            <div role="tabpanel" class="tab-pane" id="quiz">
                                    <div role="tabpanel">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                      <li role="presentation" class="active"><a href="#qa" aria-controls="qa" role="tab" data-toggle="tab">QA</a></li>
                                      <li role="presentation"><a href="#tf" aria-controls="tf" role="tab" data-toggle="tab">TF</a></li>
                                      <li role="presentation"><a href="#mcq" aria-controls="mcq" role="tab" data-toggle="tab">MCQ</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                      <div role="tabpanel" class="tab-pane active" id="qa">
                                          <h3 class="post-title">Write your question here!!</h3>
                                          <textarea class="post-txt input"></textarea><br>
                                          <button onclick="quiz()" class="btn floatRight">NewQuiz</button>
                                          <input type="submit" class="btn floatRight" value="post">
                                          <div style="clear:both"></div>
                                      </div>
                                      <div role="tabpanel" class="tab-pane" id="tf">
                                          <h3 class="post-title">Write your question here!!</h3>
                                          <textarea class="post-txt input"></textarea><br>
                                          <input type="radio" class="radioo" name="art">TRUE
                                          <input type="radio" class="radioo " name="art" checked>FALSE
                                          <button onclick="quiz()" type="Button" class="btn floatRight">NewQuiz</button>
                                          <input type="submit" class="btn floatRight" value="post">
                                          <div style="clear:both"></div>
                                      </div>
                                      <div role="tabpanel" class="tab-pane" id="mcq">
                                          <h3 class="post-title">Write your question here!!</h3>
                                          <textarea class="post-txt input"></textarea><br>
                                          
                                          <input type="text"  class="input block sideInput" placeholder="First answer">
                                          <input type="radio" class="radioo " name="art" checked><div style="clear:both"></div>
                                                    <input type="text" class="input block sideInput" placeholder="Second answer">
                                        <input type="radio" class="radioo" name="art"><div style="clear:both"></div>
                                    <input type="text" class="input block sideInput" placeholder="Third answer">
                                    <input type="radio" class="radioo" name="art"><div style="clear:both"></div>
                                                <input type="text" class="input block sideInput" placeholder="Fourth answer">
                                                <input type="radio" class="radioo" name="art"><div style="clear:both"></div>
                                                
                                                <button onclick="quiz()" class="btn floatRight" type="Button">NewQuiz</button>
                                                <input type="submit" class="btn floatRight" value="post">
                                          <div style="clear:both"></div>
                                      </div>
                                    </div>

                                  </div>
                            </div>
                                <div role="tabpanel" class="tab-pane" id="file">
                                    <form method="post">
                                                            <div class="table table-striped" class="files" id="previews">
 
                                                                <div id="template" class="file-row">
                                                                  <!-- This is used as the file preview template -->
                                                                  <div>
                                                                      <span class="preview"><img data-dz-thumbnail /></span>
                                                                  </div>
                                                                  <div>
                                                                      <p class="name" data-dz-name></p>
                                                                      <strong class="error text-danger" data-dz-errormessage></strong>
                                                                  </div>
                                                                  <div>
                                                                      <p class="size" data-dz-size></p>
                                                                      <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                                                      </div>
                                                                  </div>
                                                                  <div>
                                                                    <button class="btn btn-primary start">
                                                                        <i class="glyphicon glyphicon-upload"></i>
                                                                        <span>Start</span>
                                                                    </button>
                                                                    <button data-dz-remove class="btn btn-warning cancel">
                                                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                                                        <span>Cancel</span>
                                                                    </button>
                                                                    <button data-dz-remove class="btn btn-danger delete">
                                                                      <i class="glyphicon glyphicon-trash"></i>
                                                                      <span>Delete</span>
                                                                    </button>
                                                                  </div>
                                                                </div>

                                                              </div>
                                                  </form>
                                   
                                </div>
                              <div role="tabpanel" class="tab-pane" id="session">...</div>
                            </div>

                          </div>
                
            </div>
            
            <!-------------------------------------------------------------------------------------------
         -------------------------------------------all posts-----------------------------------------
        --------------------------------------------------------------------------------------------->
            <div class="all-posts">
                
                <!----post container---->
                    <div class="post-container floatLeft">
                        <div class="user">
                            <div class="user-img floatLeft">
                                <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!-- user img-->
                            </div>
                            <div class="user_info floatLeft">
                                <p class="user-name block">Mohamed issam</p><!--user name-->
                                <p class="post-date block">12/12/2012</p> <!--date-->   
                            </div>
                            <div style="clear:both"></div>
                        </div>
                        <p class=" input">I'm tired of being what you want me to be Feeling so faithless, lost under the surface
                         Don't know what you're expecting of me</p><!--text-->
                                     <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                      Time
                                    </div>
                                  </div>
                        <div class="add-comment">
                          <input type="text" class="input floatLeft" placeholder="leave a comment"><!--comment input-->
                          <i class="icon-lovedsgn"></i>
                          <input type="submit" class="btn floatRight" value="comment"><!--comment submit-->
                            <div style="clear:both"></div>
                        </div>
                        <div style="clear:both"></div>
                        
                        <div class="comments">
                           <ul>
                               <li>
                                   <div class="user">
                                        <div class="user-img floatLeft">
                                            <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!-- user img-->
                                        </div>
                                        <div class="user_info floatLeft">
                                            <p class="user-name block">Mohamed issam</p><!--user name-->
                                            <p class="post-date block">12/12/2012</p> <!--date-->   
                                        </div>
                                        <div style="clear:both"></div>
                                    </div>
                                   <p class="comment-body">Can't you see that you're smothering me,</p>
                               </li><!--comment :V-->
                               
                               <li>
                                   <div class="user">
                                        <div class="user-img floatLeft">
                                            <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!-- user img-->
                                        </div>
                                        <div class="user_info floatLeft">
                                            <p class="user-name block">Mohamed issam</p><!--user name-->
                                            <p class="post-date block">12/12/2012</p> <!--date-->   
                                        </div>
                                        <div style="clear:both"></div>
                                    </div>
                                   <p class="comment-body">Can't you see that you're smothering me,</p>
                               </li><!--comment :V-->
                          </ul>
                        </div>
                    </div>
                
                <div style="clear:both"></div>
                
                <div class="post-container floatLeft">
                    <div class="user">
                            <div class="user-img floatLeft">
                                <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!-- user img-->
                            </div>
                            <div class="user_info floatLeft">
                                <p class="user-name block">Mohamed issam</p><!--user name-->
                                <p class="post-date block">12/12/2012</p> <!--date-->   
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    <p class=" input">Determine whether the following teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
                    eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeet</p><br>
                    <textarea class="post-txt input"></textarea><br>
                    <input type="submit" class="btn floatRight" value="Submit Answer">
                </div>
                <div class="post-container floatLeft">
                    <div class="user">
                            <div class="user-img floatLeft">
                                <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!-- user img-->
                            </div>
                            <div class="user_info floatLeft">
                                <p class="user-name block">Mohamed issam</p><!--user name-->
                                <p class="post-date block">12/12/2012</p> <!--date-->   
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    <p class=" input">Determine whether the following teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
                    eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeet</p><br>
                    <input type="radio" class="radioo" name="art">TRUE
                    <input type="radio" class="radioo " name="art" checked>FALSE
                    <input type="submit" class="btn floatRight" value="Submit Answer">
                </div>
                <div class="post-container floatLeft">
                    <div class="user">
                            <div class="user-img floatLeft">
                                <img src="<?php echo base_url().$_SESSION['user_data']['profile_url'];?>"><!-- user img-->
                            </div>
                            <div class="user_info floatLeft">
                                <p class="user-name block">Mohamed issam</p><!--user name-->
                                <p class="post-date block">12/12/2012</p> <!--date-->   
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    <p class=" input">Determine whether the following teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
                    eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeet</p><br>
                    <input type="text"  class="input block sideInput" placeholder="First answer" disabled="">
                                <input type="radio" class="radioo " name="art" checked><div style="clear:both"></div>
                                <input type="text" class="input block sideInput" placeholder="Second answer" disabled="">
                                <input type="radio" class="radioo" name="art"><div style="clear:both"></div>
                                <input type="text" class="input block sideInput" placeholder="Third answer" disabled="">
                                <input type="radio" class="radioo" name="art"><div style="clear:both"></div>
                                <input type="text" class="input block sideInput" placeholder="Fourth answer" disabled="">
                                <input type="radio" class="radioo" name="art"><div style="clear:both"></div>
                    <input type="submit" class="btn floatRight" value="Submit Answer">
                </div>
            </div>
            
            
            <!------just text fot using css classes ---->
            <div style="clear:both"></div>
            <div class="intro block">
                <input type="text" class="input block" placeholder="text">
                
                <textarea class="text-area block input">i just want to be there with you ^^</textarea>
                <input type="checkbox" class="checkbox block">
                <input type="radio" class="radioo" name="art">
                <input type="radio" class="radioo" name="art" checked>
                <input type="radio" class="radioo" name="art">
                <select class="input block">
                    <option>happy</option>
                    <option>friends</option>
                </select>
           </div>
            </div>
        <div style="clear:both"></div>
    

</body>
</html>