
$(document).ready(function()
{
    $buttonClicked = false;

    $("#hButton").on("click", function()
    {
        //window.location = 'registration.php';
    }); 
    
    if($('.navbar-toggler').on("click",function()
    {

        if($buttonClicked == false)
        {
            $('.movement1').css({"height": "140vh"});
            $buttonClicked = true;
            console.log($buttonClicked);
        }
        else if($buttonClicked == true)
        {
            $('.movement1').css({"height": "130vh"});
            $buttonClicked = false;
            console.log($buttonClicked);
        }
    }));


    $('#table-1').DataTable(
        {
            pageLength: 5,
            stripeClasses: [],
            lengthChange: false,
            searching: false,
            bInfo: false
        }
    );

    $('#table-2').DataTable(
        {
            pageLength: 5,
            stripeClasses: [],
            lengthChange: false,
            searching: false,
            bInfo: false,
            scrollX: false
        }
    );
});