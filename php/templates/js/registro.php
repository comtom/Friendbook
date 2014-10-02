  $('.submit.button').click(function(){
    $('#form-registro').submit();
  });

$('.ui.form')
  .form({
    username: {
      identifier  : 'username',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your username'
        }
      ]
    },
    language: {
      identifier  : 'language',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter a language'
        }
      ]
    },
    first_name: {
      identifier  : 'first_name',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please type your first name'
        }
      ]
    },
    last_namef: {
      identifier : 'last_name',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please type your last name'
        }
      ]
    },
    birthday: {
      identifier : 'birthday',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please type your last name'
        }
      ]
    },
    email: {
      identifier : 'email',
      rules: [
        {
          type   : 'empty',
          prompt : 'Please enter your email'
        }
      ]
    }
  },
  {
    inline : true,
    on: 'blur',
    onSuccess : function(){
        $('#form-registro').submit();
        return false;
    }
    }
  })
;