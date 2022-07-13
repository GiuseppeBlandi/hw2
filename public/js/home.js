function fetchPosts(){

        fetch("post").then(fetchResponse).then(fetchPostsJson);
}

function fetchResponse(response) {
    console.log(response);
    if (!response.ok) {return null};
    return response.json();
}

function fetchPostsJson(json) {
    console.log(json);
    const feed = document.getElementById('feed');
    
    for (let i in json) {
        const post = document.getElementById('post_template').content.cloneNode(true).querySelector(".post");
        post.dataset.id = post.querySelector("input[type=hidden]").value = json[i].postid;
        
        const name = post.querySelector(".name");
        name.textContent = json[i].name + " " + json[i].surname;
        
        post.querySelector(".username").textContent = "@" + json[i].username;
        post.querySelector(".time").textContent = json[i].time;
        post.querySelector(".content").textContent = json[i].content;
    
        const like = post.querySelector(".like");
        if (json[i].liked == 0) {

            like.addEventListener('click', likePost);
        } else {
            like.classList.remove('like');
            like.classList.add('liked');
            like.addEventListener('click', unlikePost);
        }
        const nlike = like.querySelector("span");
        nlike.textContent = json[i].nlikes;
        post.querySelector(".comment").textContent = json[i].ncomments;
        post.querySelector(".comment").addEventListener('click', commentPost);
        post.querySelector("form").addEventListener('submit', sendNewComment);

        feed.appendChild(post);
    }    
    
}


///LIKE

function likePost(event) {
    button = event.currentTarget;

    const formData = new FormData();
    formData.append('post_id', button.parentNode.parentNode.dataset.id);
    formData.append('_token', CSFR_TOKEN);

    fetch("add_like",{method: 'post',body: formData}).then(fetchResponse)
    .then(function (json){ return updateLikes(json, button); });

    button.classList.remove('like');
    button.classList.add('liked');

    button.removeEventListener('click', likePost);
    button.addEventListener('click', unlikePost);
}

function updateLikes(json, button) {
    button.querySelector('span').textContent = json.nlikes;
}


function unlikePost(event) {
    button = event.currentTarget;

    const formData = new FormData();
    formData.append('post_id', button.parentNode.parentNode.dataset.id);
    formData.append('_token', CSFR_TOKEN);

    fetch("remove_like", {method: 'post', body: formData}).then(fetchResponse)
    .then(function (json){ return updateLikes(json, button); });

    button.classList.remove('liked');
    button.classList.add('like');

    button.removeEventListener('click', unlikePost);
    button.addEventListener('click', likePost);
}



//COMMENTS
function sendNewComment(event) {
    event.preventDefault();
    const cont = event.currentTarget.parentNode.parentNode.parentNode;
    console.log(cont);
    console.log(event.currentTarget);
    const formData = new FormData(event.currentTarget);
    
    formData.append('_token', CSFR_TOKEN);
    for (pair of formData){
        console.log(pair[0]+' '+pair[1]);
    }
    fetch("post/comment", {method: 'post', body: formData}).then(fetchResponse)
    .then(function (json){ 
        return updateComments(json, cont); 
    });

    const t = event.currentTarget.querySelector('input[type=text]');
    t.blur();
    t.value = " ";
    event.preventDefault();
}

function commentPost(event){
    const post =  event.currentTarget.parentNode.parentNode;
    console.log(post.dataset.id);
    const ncomments=post.querySelector(".comment");

    if(ncomments.textContent>0){
        fetch("post/"+post.dataset.id+"/comments").then(fetchResponse)
            .then(function (json){ 
                return updateComments(json, post);
            });
    }
    const comments=post.querySelector(".comments");

    if(comments.clientHeight>55){
        comments.classList.add("hidden")
    }else {
        comments.classList.remove("hidden")
    }
} 




function updateComments(json, section) {
    console.log(json);
    const container = section.querySelector(".past_messages");
    const post=section;
    const action=post.querySelector(".actions .comment");

    container.innerHTML = '';
    let i;

    for (i = Object.keys(json).length-1; i >= 0; i--) {

        const message = document.createElement('div');
        const userinfo = document.createElement('div');
        userinfo.classList.add('userinfo');
        message.appendChild(userinfo);

        const username = document.createElement('a');
        username.href = json[i].user.username;
        username.classList.add('username');
        username.textContent = "@"+json[i].user.username;
        userinfo.appendChild(username);

        const time = document.createElement('div');
        time.classList.add('time');
        time.textContent = json[i].time;
        userinfo.appendChild(time);

        const text = document.createElement('div');
        text.classList.add('text');
        text.textContent = json[i].content.text;
        message.appendChild(text);
        
        container.appendChild(message);

    } 
     container.scrollTop = container.scrollHeight;
     action.textContent=json.length;
}

let lastFetchedPostId=null;
fetchPosts();


/***PROSSIMA E SCORSA GARA ***/

function lastRace(){
    fetch("last_race").then(fetchResponse).then(fetchLastRaceJson);    
}

function fetchLastRaceJson(json){
    console.log(json);
    const results=json[0];
    console.log(results);
    const container=document.querySelector(".last_race");
    container.textContent="Gara precedente: \""+results.name+"\" circuito di "+results.city+" vinta da "+results.winner;
    
}

function nextRace(){
    fetch("next_race").then(fetchResponse).then(fetchNextRaceJson);    
}

function fetchNextRaceJson(json){
    console.log("prossima gara");
    const results=json[0];
    console.log(results);
    const container=document.querySelector(".next_race");
    container.textContent="Prossima gara: \""+results.name+"\" circuito di "+results.city;
}

nextRace();
lastRace();

