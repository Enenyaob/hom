function myfunction(){
    // confirm("Are you sure you delete this?")
    if(confirm('Are you sure you want to delete?')){
        console.log('deleted');
    }else{
        console.log('Delete canceled');
    }
}