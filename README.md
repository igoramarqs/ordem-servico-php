# ordem-servico-php
Painel administrativo básico para gerenciamento de ordens de serviços desenvolvido em PHP com armazenamento de dados em Mysql.

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:
* Tenha a versão >= 8 do PHP;
* Tenha a versão mais atualizada e correspondente à sua versão do PHP o [mPDF](https://github.com/mpdf/mpdf);
* Tenha habilitado as bibliotecas GD, MBString e Mysqli;
* Tenha o [Composer](https://getcomposer.org/download/) instalado em sua máquina.

## ⚠️ Configurações e primeiros passos
* Últimos lançamentos são armazenados na branch [Release 0.1](https://github.com/devwee/ordem-servico-php/tree/release-0.1), não na branch **main**. Vocês devem realizar o download dos arquivos da branch **[Release 0.1](https://github.com/devwee/ordem-servico-php/tree/release-0.1)**.

* Ao clonar o projeto, entre na pasta do projeto via linha de comando e execute o comando para baixar as dependências do projeto:
```
composer install
```

* Dentro da pasta do projeto, na pasta backend, acesse o arquivo core.php. Você apenas deverá definir entre 2 opções a variável "$mode", "dev" (develop mode) ou "prod" (production mode). Ao deixar "dev" ativado, preencha o valor da variável "project_name" com o mesmo nome da pasta onde você armazenará o projeto (por exemplo no xampp: xampp/htdocs/ordem_servico, o valor da variável seria "ordem_servico" sem aspas).

* Ainda na pasta backend, no arquivo mysql.php, você apenas deverá preencher os dados com as informações de seu banco de dados. Lembre-se de importar o banco de dados completo que está localizado na pasta "database" deste projeto.

* Já na raiz do projeto, acesse o arquivo config.ini e configure inicialmente o "site_url". Neste campo você deve deixar sempre a "/" no final. NUNCA DEIXE SEM A "/". De resto é configuração padrão e devem receber valores em String, dentro de aspas duplas.

* Já navegando no site, acesse o painel utilizando as seguintes credenciais:
```
Nome de usuário: admin
Senha de acesso: admin
```

## ☕ Changelogs

```
🔧fix: Corrigimos alguma coisa no projeto.
🆕feat ou feature: Adicionamos alguma coisa no projeto.
↪️update: Alteramos alguma coisa no projeto.
```

## 🤝 Desenvolvedor

Agradecemos às seguintes pessoas que contribuíram para este projeto:

<table>
  <tr>
    <td align="center">
      <a href="#">
        <img src="https://avatars.githubusercontent.com/u/111082011?v=4" width="100px;" alt="Foto do Igor (wee) no GitHub"/><br>
        <sub>
          <b>Igor (wee)</b>
        </sub>
      </a>
    </td>    
  </tr>
</table>

## 📝 Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE) para mais detalhes.

## 🤝 Referências

[🖌️ SB Admin Theme](https://github.com/startbootstrap/startbootstrap-sb-admin-2)<br>
[📰 mPDF](https://github.com/mpdf/mpdf)
<hr>

[⬆ Voltar ao topo](#ordem-servico-php)<br>
