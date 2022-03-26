function check(opt,ans){
    $.ajax({
        url:"./cms/save.php?action=updateScore",
        type:"POST",
        data:{
            opt:opt,
            ans:ans
        },
      success: function(response){
        console.log(`response`, response)
      }
 })
}

function submit(){
    $.ajax({
        url:"./cms/save.php?action=submitQuiz",
        type:"POST",
      success: function(response){
          if(response){
        alert("Congragulation , Your score is "+response)
        window.location='./profile.php'
          }else{
            window.location='./profile.php'
          }
      }
 })
}