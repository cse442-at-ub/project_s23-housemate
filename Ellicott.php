<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Housemate</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <main>
      
        <div class="header">
          <div class="inner_header">
            <div class="logo_container">
              <h1>House<span>mate</span></h1>
            </div>

            <ul class="navigation">
              <a href="index.html"><li>Home</li></a>
              <a><li>Create account</li></a>
              <a><li>Login</li></a>
            </ul>
          </div>
        </div>

        <div class="housing_title">
          <h1>Ellicott Complex</h1>
          <a href="https://www.buffalo.edu/campusliving/find-your-home/where-can-i-live/residence-halls/ellicott-complex.html">Learn more</a>
        </div>
        

        <!-- Slideshow container -->
        <div class="slideshow-container fade">

          <!-- Full images with numbers and message Info -->
          <div class="Containers">
            <div class="MessageInfo">1 / 3</div>
            <img src="ellicott1.jpg" style="width:100%">
          </div>

          <div class="Containers">
            <div class="MessageInfo">2 / 3</div>
            <img src="ellicott2.jpg" style="width:100%">
          </div>

          <div class="Containers">
            <div class="MessageInfo">3 / 3</div>
            <img src="ellicott3.jpg" style="width:100%">
          </div>

          <!-- Back and forward buttons -->
          <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
          <a class="forward" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The circles/dots -->
        <div style="text-align:center">
          <span class="dots" onclick="currentSlide(1)"></span>
          <span class="dots" onclick="currentSlide(2)"></span>
          <span class="dots" onclick="currentSlide(3)"></span>
        </div>

        <template class="reply-input-template">
          <div class="reply-input container">
            <textarea class="cmnt-input" placeholder="Add a comment..."></textarea>
            <button class="bu-primary">SEND</button>
          </div>
        </template>
      
        <template class="comment-template">
          <div class="comment-wrp">
            <div class="comment container">
              <div class="c-score">
                <img src="images/icon-plus.svg" alt="plus" class="score-control score-plus">
                <p class="score-number">5</p>
                <img src="images/icon-minus.svg" alt="minus" class="score-control score-minus">
              </div>
              <div class="c-controls">
                <a  class="delete"><img src="images/icon-delete.svg" alt="" class="control-icon">Delete</a>
                
                <?php
                  if (isset($_SESSION["useruid"])) {
                    echo "<a  class=\"reply\"><img src=\"images/icon-reply.svg\" alt=\"\" class=\"control-icon\">Reply</a>";
                  }
                ?>
              </div>
              <div class="c-user">
                <img src="images/avatars/image-maxblagun.webp" alt="" class="usr-img">
                <p class="usr-name">Test</p>
                <p class="cmnt-at">2 weeks ago</p>    
              </div>
              <p class="c-text">
                <span class="reply-to"></span>
                <span class="c-body"></span>
              </p>
            </div><!--comment-->
            <div class="replies comments-wrp">
            </div><!--replies-->
          </div>
        </template>

        <?php
            if (isset($_SESSION["useruid"])) {
              echo "<div class=\"comment-section\">
                      <div class=\"comments-wrp\">
                      </div> <!--commentS wrapper-->
                      <div class=\"reply-input container\">
                        <textarea class=\"cmnt-input\" placeholder=\"Add a comment...\"></textarea>
                        <button class=\"bu-primary\">SEND</button>
                       </div> <!--reply input-->
                    </div> <!--comment sectio-->";
            }
          ?>
        
        <div class="modal-wrp invisible">
          <div class="modal container">
            <h3>Delete comment</h3>
            <p>Are you sure you want to delete this comment? This will remove the comment and cant be undone</p>
            <button class="yes">YES,DELETE</button>
            <button class="no">NO,CANCEL</button>
          </div>
        </div>

    </main>
    <script>

var slidePosition = 1;
      SlideShow(slidePosition);

      // forward/Back controls
      function plusSlides(n) {
        SlideShow(slidePosition += n);
      }

      //  images controls
      function currentSlide(n) {
        SlideShow(slidePosition = n);
      }

      function SlideShow(n) {
        var i;
        var slides = document.getElementsByClassName("Containers");
        var circles = document.getElementsByClassName("dots");
        if (n > slides.length) {slidePosition = 1}
        if (n < 1) {slidePosition = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < circles.length; i++) {
            circles[i].className = circles[i].className.replace(" enable", "");
        }
        slides[slidePosition-1].style.display = "block";
        circles[slidePosition-1].className += " enable";
      } 

      const data = {
        currentUser: {
          image: {
            png: "./images/avatars/Yuanjie.png",
            webp: "./images/avatars/Yuanjie.webp",
          },
          username: "Yuanjie",
        },
        comments: [
          {
            parent: 0,
            id: 1,
            content:
              "It is very close to campus!",
            createdAt: "1 month ago",
            score: 12,
            user: {
              image: {
                png: "./images/avatars/Aryaman.png",
                webp: "./images/avatars/Aryaman.webp",
              },
              username: "Aryaman",
            },
            replies: [],
          },
        ],
      };
      function appendFrag(frag, parent) {
        var children = [].slice.call(frag.childNodes, 0);
        parent.appendChild(frag);
        //console.log(children);
        return children[1];
      }
    
      const addComment = (body, parentId, replyTo = undefined) => {
        let commentParent =
          parentId === 0
            ? data.comments
            : data.comments.filter((c) => c.id == parentId)[0].replies;
        let newComment = {
          parent: parentId,
          id:
            commentParent.length == 0
              ? 1
              : commentParent[commentParent.length - 1].id + 1,
          content: body,
          createdAt: "Now",
          replyingTo: replyTo,
          score: 0,
          replies: parent == 0 ? [] : undefined,
          user: data.currentUser,
        };
        commentParent.push(newComment);
        initComments();
      };
      const deleteComment = (commentObject) => {
        if (commentObject.parent == 0) {
          data.comments = data.comments.filter((e) => e != commentObject);
        } else {
          data.comments.filter((e) => e.id === commentObject.parent)[0].replies =
            data.comments
              .filter((e) => e.id === commentObject.parent)[0]
              .replies.filter((e) => e != commentObject);
        }
        initComments();
      };
    
      const promptDel = (commentObject) => {
        const modalWrp = document.querySelector(".modal-wrp");
        modalWrp.classList.remove("invisible");
        modalWrp.querySelector(".yes").addEventListener("click", () => {
          deleteComment(commentObject);
          modalWrp.classList.add("invisible");
        });
        modalWrp.querySelector(".no").addEventListener("click", () => {
          modalWrp.classList.add("invisible");
        });
      };
    
      const spawnReplyInput = (parent, parentId, replyTo = undefined) => {
        if (parent.querySelectorAll(".reply-input")) {
          parent.querySelectorAll(".reply-input").forEach((e) => {
            e.remove();
          });
        }
        const inputTemplate = document.querySelector(".reply-input-template");
        const inputNode = inputTemplate.content.cloneNode(true);
        const addedInput = appendFrag(inputNode, parent);
        addedInput.querySelector(".bu-primary").addEventListener("click", () => {
          let commentBody = addedInput.querySelector(".cmnt-input").value;
          if (commentBody.length == 0) return;
          addComment(commentBody, parentId, replyTo);
        });
      };
    
      const createCommentNode = (commentObject) => {
        const commentTemplate = document.querySelector(".comment-template");
        var commentNode = commentTemplate.content.cloneNode(true);
        commentNode.querySelector(".usr-name").textContent =
          commentObject.user.username;
        commentNode.querySelector(".usr-img").src = commentObject.user.image.webp;
        commentNode.querySelector(".score-number").textContent = commentObject.score;
        commentNode.querySelector(".cmnt-at").textContent = commentObject.createdAt;
        commentNode.querySelector(".c-body").textContent = commentObject.content;
        if (commentObject.replyingTo)
          commentNode.querySelector(".reply-to").textContent =
            "@" + commentObject.replyingTo;
      
        commentNode.querySelector(".score-plus").addEventListener("click", () => {
          commentObject.score++;
          initComments();
        });
      
        commentNode.querySelector(".score-minus").addEventListener("click", () => {
          commentObject.score--;
          if (commentObject.score < 0) commentObject.score = 0;
          initComments();
        });
        if (commentObject.user.username == data.currentUser.username) {
          commentNode.querySelector(".comment").classList.add("this-user");
          commentNode.querySelector(".delete").addEventListener("click", () => {
            promptDel(commentObject);
          });
          return commentNode;
        }
        return commentNode;
      };
    
      const appendComment = (parentNode, commentNode, parentId) => {
        const bu_reply = commentNode.querySelector(".reply");
        // parentNode.appendChild(commentNode);
        const appendedCmnt = appendFrag(commentNode, parentNode);
        const replyTo = appendedCmnt.querySelector(".usr-name").textContent;
        bu_reply.addEventListener("click", () => {
          if (parentNode.classList.contains("replies")) {
            spawnReplyInput(parentNode, parentId, replyTo);
          } else {
            //console.log(appendedCmnt.querySelector(".replies"));
            spawnReplyInput(
              appendedCmnt.querySelector(".replies"),
              parentId,
              replyTo
            );
          }
        });
      };
    
      function initComments(
        commentList = data.comments,
        parent = document.querySelector(".comments-wrp")
      ) {
        parent.innerHTML = "";
        commentList.forEach((element) => {
          var parentId = element.parent == 0 ? element.id : element.parent;
          const comment_node = createCommentNode(element);
          if (element.replies && element.replies.length > 0) {
            initComments(element.replies, comment_node.querySelector(".replies"));
          }
          appendComment(parent, comment_node, parentId);
        });
      }
      
      initComments();
      const cmntInput = document.querySelector(".reply-input");
      cmntInput.querySelector(".bu-primary").addEventListener("click", () => {
        let commentBody = cmntInput.querySelector(".cmnt-input").value;
        if (commentBody.length == 0) return;
        addComment(commentBody, 0);
        cmntInput.querySelector(".cmnt-input").value = "";
      });

    </script>
  </body>
</html>