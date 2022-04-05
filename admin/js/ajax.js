$(document).ready(function() {
    $(".categoryModal").click(function(){

        $("#saveCategoryForm").trigger('reset');
        $("#catgid").val('');
        $("#categoryModal").modal("show");
        });

            $(".topicModal").click(function(){

                $("#saveTopicForm").trigger('reset');
                $("#topid").val('');
                $("#topicModal").modal("show");
                });
        $(".questionModal").click(function(){

            $("#saveQuestionForm").trigger('reset');
            $("#que_category").val('');
            $("#questionModal").modal("show");
            });
            $('#add_topic').on('click',function() {
                var id=$('#topid').val();
                var topic=$('#topic').val();
                if(topic!=""){
                   $.ajax({
                       url:"./cms/save.php?action=topics",
                       type:"POST",
                       data:{
                           id:id,
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
                    $("#topic").val(res.qt_name)
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
    $('.delete_category').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=category",
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

    $('.edit_category').on('click', function() {
        var id=$(this).attr('id');
        $.ajax({
            url:"./cms/edit.php?action=category",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            console.log(`res`, res)
            $("#catgid").val(res.catg_id)
             $("#category").val(res.catg_name)
             $("#topic_cat_id").val(res.catg_qt_id)

          }
     })
    })

    $('#add_category').on('click',function() {
        var id=$('#catgid').val();
        var category=$('#category').val();
        var topic=$('#topic_cat_id').val();
        if(category!=""){
           $.ajax({
               url:"./cms/save.php?action=category",
               type:"POST",
               data:{
                   id:id,
                   category:category,
                   topic:topic
               },
             success: function(dataResult){
                    console.log(dataResult);
                    alert(dataResult);
                    location.reload();
          }
        })
     }else{
         alert("Please fill the category")
     }
    })

    $('#add_question').on('click',function() {
        var id=$('#queid').val();
        var category=$('#que_category').val();
        var question=$('#question').val();
        var option_one=$('#option_one').val();
        var option_two=$('#option_two').val();
        var option_three=$('#option_three').val();
        var option_four=$('#option_four').val();
        var answer=$('#answer').val();
        if(category!="" && question!=''  && option_one!=''  && option_two!=''  && option_three!=''  && option_four!=''  && answer!=''){
           $.ajax({
               url:"./cms/save.php?action=question",
               type:"POST",
               data:{
                   id:id,
                   category:category,
                   question:question,
                   option_one:option_one,
                   option_two:option_two,
                   option_three:option_three,
                   option_four:option_four,
                   answer:answer,
               },
             success: function(dataResult){
                    console.log(dataResult);
                    alert(dataResult);
                    location.reload();
          }
        })
     }else{
         alert("Please fill the category")
     }
    })

    $('.edit_questions').on('click', function() {
        var id=$(this).attr('id');
        $.ajax({
            url:"./cms/edit.php?action=question",
            type:"POST",
            data:{
                id:id,
            },
          success: function(response){
            var res=JSON.parse(response)
            console.log(`res`, res)
            $('#queid').val(res.qu_id);
            $('#que_category').val(res.type);
            $('#question').val(res.question);
            $('#option_one').val(res.option_one);
            $('#option_two').val(res.option_two);
            $('#option_three').val(res.option_three);
            $('#option_four').val(res.option_four);
            $('#answer').val(res.correctIndex);
          }
     })
    })

    $('.delete_question').on('click', function() {

        var id=$(this).attr('id')
        $.ajax({
            url:"./cms/delete.php?action=question",
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

})