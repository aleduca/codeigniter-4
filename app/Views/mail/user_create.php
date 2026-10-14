<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f5; font-family: Arial, Helvetica, sans-serif; color: #27272a;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #f4f4f5; padding: 40px 16px;">
        <tr>
            <td align="center">

                <!-- Container -->
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width: 560px; background-color: #ffffff; border: 1px solid #e4e4e7; border-radius: 12px;">

                    <!-- Header -->
                    <tr>
                        <td style="padding: 32px 32px 24px; border-bottom: 1px solid #f4f4f5;">
                            <h1 style="margin: 0; font-size: 22px; line-height: 1.4; font-weight: 700; color: #18181b;">
                                Minha Aplicação
                            </h1>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 32px;">

                            <h2 style="margin: 0 0 20px; font-size: 22px; line-height: 1.4; font-weight: 600; color: #18181b;">
                                Olá, <?= $user['firstName'] ?>
                            </h2>

                            <p style="margin: 0 0 16px; font-size: 15px; line-height: 1.8; color: #52525b;">
                                Você acabou de se cadastrar no site <a href="http://localhost:8000">Clube Full-Stack</a
                            </p>

                            <p style="margin: 0 0 28px; font-size: 15px; line-height: 1.8; color: #52525b;">
                                Clique no botão abaixo para acessar a página e conferir os detalhes.
                            </p>

                            <!-- Button -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td align="center" style="border-radius: 8px; background-color: #4f46e5;">
                                        <a
                                            href="http://localhost:8000"
                                            target="_blank"
                                            style="display: inline-block; padding: 13px 24px; font-size: 14px; font-weight: 600; color: #ffffff; text-decoration: none; border-radius: 8px;"
                                        >
                                            Acessar página
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin: 28px 0 0; font-size: 14px; line-height: 1.7; color: #71717a;">
                                Se o botão não funcionar, copie e cole o endereço abaixo no navegador:
                            </p>

                            <p style="margin: 8px 0 0; font-size: 13px; line-height: 1.7; overflow-wrap: anywhere;">
                                <a href="http://localhost:8000" style="color: #4f46e5; text-decoration: underline;">
                                    http://localhost:8000
                                </a>
                            </p>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 24px 32px; border-top: 1px solid #f4f4f5; background-color: #fafafa; border-radius: 0 0 12px 12px;">

                            <p style="margin: 0 0 8px; font-size: 12px; line-height: 1.6; color: #71717a;">
                                Esta mensagem foi enviada automaticamente pela Minha Aplicação.
                            </p>

                            <p style="margin: 0; font-size: 12px; line-height: 1.6; color: #a1a1aa;">
                                © 2026 Minha Aplicação. Todos os direitos reservados.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
