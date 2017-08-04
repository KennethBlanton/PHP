$('form').on('submit',function(e) {
    e.preventDefault();

    console.log("handle_rsvp.php?" + $('form').serialize())
    $.ajax({
      type:'POST',
      url: "handle_rsvp.php?" + $('form').serialize(),
      processData: false,
      contentType: false,
      success: function(response) {
        $('.success').append(response);
      }
    });
    $('form')[0].reset();
})

