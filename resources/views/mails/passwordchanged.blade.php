@include('mails.header')
<table>
    <tr>
        <td bgcolor="#ffffff" align="left"
            style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
            <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                Для вашего аккаунта было запрошено восстановление пароля и сгенерирован новый пароль.
                Учетные данные для входа на сайт:

            </p>
            <br>
            <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                Email: {{$user->email}}
            </p>
            <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                Телефон: {{$user->phone}}
            </p>

            <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                Пароль: {{$password}}
            </p>

            <p style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:18px;color:#666666;font-size:14px">
                После успешной авторизации Вы сможете сменить пароль самостоятельно в личном кабинете.
            </p>

        </td>
    </tr>
</table>

@include('mails.footer')

