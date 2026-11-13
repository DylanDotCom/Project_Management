let closeModal = () => {
    const modal = document.getElementById("login_modal");
    modal.style.display= "none";
    document.getElementById("backdrop").style.display = "none";
}
/*Show Login*/
let showLoginModal = () => {
    let modal = document.getElementById("login_modal");
    modal.style.display= "block";
    document.getElementById("backdrop").style.display = "block";

    const modal_header = '<img src="bootstrap/images/sc2.png" alt="avatar" width="70px">' + 
    '<button class="close cursor" onclick="closeModal()">&times;</button> <br> <div class="modal_content">';

    const modal_content= '<form id="login" onsubmit="return loginUser()">' +
    '<label for="username">Username:</label>' +
    '<input type="text" id="username" name="username" required></br>' +
    '<label for="password">Password:</label>' +
    '<input type="password" id="password" name="password" required></br>' +
    '<div id="button"> <input type="submit" value="Login"><br></div></form>' +
    '<div id="login_response"><br></div>' +
    '<button class="button3" onclick="showCreateUserModal()">Create User</button></div>';
    
     modal.innerHTML = '<div class="modal" >' + modal_header + modal_content + '</div>';
}

let showCreateUserModal = () => {
    const modal = document.getElementById("login_modal");
    modal.style.display= "block";
    document.getElementById("backdrop").style.display = "block";

    modal_header = ' <img src="bootstrap/images/sc2.png" alt="avatar" width="70px">' + 
    '<button class="close cursor" onclick="closeModal()">&times;</button> <br> <div class="modal-content">';

    modal_content=' <form id="create" onsubmit="return createUser()">' +
    '<label for="username">Username:</label>' +
    '<input type="text" id="username" name="username" required></br>' +
    '<label for="password">Password:</label>' +
    '<input type="password" id="password" name="password" required></br>' +
    '<label for="email">Email:</label>' +
    '<input type="text" id="create_email" name="email" required></br>' +
    '<div id="button"> <input type="submit" value="Create User"><br></div></form>' +
    '<div id="login_response2"><br></div>' +
     '<button class="button3" onclick="showLoginModal()">Login</button></div>';
     
     modal.innerHTML = modal_header + modal_content;
}

function loginUser() {
    const formData = new FormData(document.getElementById("login"));
    
    fetch("login.php", {
        //CHanging php
        method: "POST",
        body: formData,
    })

    .then((response) => {
        if(response.ok) {
            return response.json();
        }
        throw new Error("Network response was not ok.");
    })
    .then((data) => {
        console.log(data);
        if(data.success) {
            document.getElementById("login_response").innerHTML = data.message;
            document.getElementById("user_name").innerHTML = formData.get("username");
            closeModal();

        } else {
            document.getElementById("login_response").innerHTML = data.message;
        }
    })
    .catch((error) => {
        console.error("Error: ", error);
    });


return false;
}

function createUser() {

    const formData = new FormData(document.getElementById("create"));

    fetch("createUser.php", {
        method: "POST",
        body: formData,
    })

    .then((response) => {
        if(response.ok) {
            return response.text();
        }
      throw new Error("Network response was not ok.");
    })
    .then((data) => {
        document.getElementById("login_response2").innerHTML = data;
    })
    .catch((error) => {
        console.error("Error: ", error);
    });

    return false;
}

