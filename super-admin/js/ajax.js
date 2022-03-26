$(document).ready(function() {
    $(".userModal").click(function(){

        $("#saveUserForm").trigger('reset');
        $("#userModal").modal("show");
        });
    $(".topicModal").click(function(){

        $("#saveTopicForm").trigger('reset');
        $("#topicModal").modal("show");
        });

    $('.delete_user').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=user",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            alert(response)
            location.reload();
          }
     })
    })

    $('.edit_user').on('click', function() {
        var id=$(this).attr('id');
        $.ajax({
            url:"./cms/edit.php?action=user",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            $("#userid").val(res.id)
             $("#username").val(res.username)
             $("#password").val(res.password)
          }
     })
    })

    $('.delete_topics').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=topics",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            alert(response)
            location.reload();
          }
     })
    })

    $('.edit_topics').on('click', function() {
        var id=$(this).attr('id');
        $.ajax({
            url:"./cms/edit.php?action=topic",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            console.log(`res`, res)
            $("#topid").val(res.qt_id)
             $("#user").val(res.qt_id)
             $("#topic").val(res.qt_name)
          }
     })
    })

    $('#add_user').on('click',function() {
        var id=$('#userid').val();
        var username=$('#username').val();
        var password=$('#password').val();
        if(username!="" && password!=''){
           $.ajax({
               url:"./cms/save.php?action=user",
               type:"POST",
               data:{
                   id:id,
                   username:username,
                   password:password,
               },
             success: function(dataResult){
                    console.log(dataResult);
                    alert(dataResult);
                    location.reload();

          }

        })

     }else{
         alert("Please fill the username or password")
     }
    })

    $('#add_topic').on('click',function() {
        var id=$('#topid').val();
        var topic=$('#topic').val();
        var user=$('#user').val();
        if(topic!=""){
           $.ajax({
               url:"./cms/save.php?action=topics",
               type:"POST",
               data:{
                   id:id,
                   user:user,
                   topic:topic,
               },
             success: function(dataResult){
                    console.log(dataResult);
                    alert(dataResult);
                    location.reload();

          }

        })

     }else{
         alert("Please fill the topics")
     }
    })

})