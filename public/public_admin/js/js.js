  $(document).ready(function() {
    $('.danhsach li').slideUp();
    $('.truyen').click(function() {
      $('.danhsach li').slideToggle();
       $('.truyen').toggleClass('add');
    });
  });
    $(document).ready(function() {
    $('.danhsach2 li').slideUp();
    $('.item-chuyenmuc').click(function() {
      $('.danhsach2 li').slideToggle();
       $('.item-chuyenmuc').toggleClass('add');
    });
  });