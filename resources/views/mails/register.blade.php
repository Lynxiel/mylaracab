
            @include('mails.header')
            <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td style="padding:0;Margin:0;background-color:#ffa73b" bgcolor="#ffa73b" align="center">
                        <table class="es-content-body"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                               cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0">
                                    <table width="100%" cellspacing="0" cellpadding="0"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                <table
                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#ffffff;border-radius:4px"
                                                    width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                                                    role="presentation">
                                                    <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center"
                                                            style="Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px">
                                                            <h1 style="Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:48px;font-style:normal;font-weight:normal;color:#111111">
                                                                Здравствуйте!</h1></td>
                                                    </tr>
                                                    <tr style="border-collapse:collapse">
                                                        <td bgcolor="#ffffff" align="center"
                                                            style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;font-size:0">
                                                            <table width="100%" height="100%" cellspacing="0"
                                                                   cellpadding="0" border="0" role="presentation"
                                                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                <tbody>
                                                                <tr style="border-collapse:collapse">
                                                                    <td style="padding:0;Margin:0;border-bottom:1px solid #ffffff;background:#FFFFFF none repeat scroll 0% 0%;height:1px;width:100%;margin:0px"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td align="center" style="padding:0;Margin:0">
                        <table class="es-content-body"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                               cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0">
                                    <table width="100%" cellspacing="0" cellpadding="0"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                <table
                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#ffffff"
                                                    width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                                                    role="presentation">
                                                    <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td class="es-m-txt-l" bgcolor="#ffffff" align="left"
                                                            style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                                Благодарим за регистрацию на нашем сайте. Для входа используйте следующие данные:</p>
                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                               Email: {{$email}}</p>

                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                                Телефон: {{$phone}}</p>
                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                                Пароль: {{$password}}</p>
                                                        </td>
                                                    </tr>


                                                    <tr style="border-collapse:collapse">
                                                        <td class="es-m-txt-l" align="left"
                                                            style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px">
                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                                Если у вас есть вопросы, то просто ответьте на это письмо. Мы всегда рады помочь!</p></td>
                                                    </tr>
                                                    <tr style="border-collapse:collapse">
                                                        <td class="es-m-txt-l" align="left"
                                                            style="Margin:0;padding-top:20px;padding-left:30px;padding-right:30px;padding-bottom:40px">
                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                                С уважением, </p>
                                                            <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#666666;font-size:18px">
                                                                КабельОпт71</p></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td align="center" style="padding:0;Margin:0">
                        <table class="es-content-body"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                               cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0">
                                    <table width="100%" cellspacing="0" cellpadding="0"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                    <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center"
                                                            style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px;font-size:0">
                                                            <table width="100%" height="100%" cellspacing="0"
                                                                   cellpadding="0" border="0" role="presentation"
                                                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                <tbody>
                                                                <tr style="border-collapse:collapse">
                                                                    <td style="padding:0;Margin:0;border-bottom:1px solid #f4f4f4;background:#FFFFFF none repeat scroll 0% 0%;height:1px;width:100%;margin:0px"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody>
                <tr style="border-collapse:collapse">
                    <td align="center" style="padding:0;Margin:0">
                        <table class="es-content-body"
                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                               cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="border-collapse:collapse">
                                <td align="left" style="padding:0;Margin:0">
                                    <table width="100%" cellspacing="0" cellpadding="0"
                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tbody>
                                        <tr style="border-collapse:collapse">
                                            <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                <table
                                                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#ffecd1;border-radius:4px"
                                                    width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffecd1"
                                                    role="presentation">
                                                    <tbody>
                                                    <tr style="border-collapse:collapse">
                                                        <td align="center"
                                                            style="padding:0;Margin:0;padding-top:30px;padding-left:30px;padding-right:30px">
                                                            <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#111111">
                                                                Нужна помощь?</h3></td>
                                                    </tr>
                                                    <tr style="border-collapse:collapse">
                                                        <td esdev-links-color="#ffa73b" align="center"
                                                            style="padding:0;Margin:0;padding-bottom:30px;padding-left:30px;padding-right:30px">
                                                            <a target="_blank" href="###"
                                                               style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#ffa73b;font-size:18px">Напишите нам</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            @include('mails.footer')

