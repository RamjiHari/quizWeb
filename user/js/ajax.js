function check(opt,ans,index,tot){

  var nextindex=index+1

  $("#qu_"+index).hide();
  $("#qu_"+nextindex).show();
    $.ajax({
        url:"./cms/save.php?action=updateScore",
        type:"POST",
        data:{
            opt:opt,
            ans:ans
        },
      success: function(response){
        if(nextindex>tot  ){
          submit()
        }

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

