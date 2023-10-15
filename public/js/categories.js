$(function (){
    $('.delete_category').click(function(e) {
       e.preventDefault();
       const categoryId = $(this).data('id');
       if(confirm("Are you sure you want to delete this category?")){
          $(this).attr("href", "categories/delete/"+categoryId);
       }
       else{
         return false;
       }
    });
});

