# Help Desk

HelpDesk é uma aplicação simples criada para abrir chamados de ajuda sobre problemas envolvendo software, hardware e etc. para uma empresa, enquanto se aprende e pratica chamadas HTTP, formulários, componentização, estilização e interação com banco de dados utilizando a LAMP (Linux, Apache, MySQL e PHP) e funcionalidades modernas do desenvolvimento web (HTML5, CSS3, Bootstrap e JS). Sinta-se livre para clonar esse repositório, abrir PR's, issues, puxar forks e o que preferir.
Escolhi, dessa vez, manter a maioria dos arquivos e códigos em português para alcançar mais facilmente, proporcionar acessibilidade e unir a comunidade de Devs que falam essa língua por todo o mundo, mas caso seja interesse da comunidade posso abrir um *branch* em inglês. ;)

**Home**
![Home HelpDesk](https://user-images.githubusercontent.com/67481026/127752984-cbc55dcf-83ee-4499-979a-9af2df521f4d.png)

**Abrindo chamados**
![Tela abrir chamados](https://user-images.githubusercontent.com/67481026/127753002-77d14667-9c42-4301-84d0-05ea121ababf.png)

Aceito qualquer sugestão de como melhorar o projeto! :)

# Banco de Dados
Para este projeto, a sintaxe de comandos SQL usados foram voltados para o banco escolhido (MySQL), mas como o método de comunicação utilizado é o PDO, caso seja do seu interesse migrar meu projeto para outros banco de dados relacionais, o processo será simples.

Cada model é baseado no jeito que EU pensei o banco de dados, considerando que a aplicação inicial não usa banco de dados SQL. Caso seja interessante para você, modele seu banco e crie seus arquivos de models personalizados.

Eu não implementei uma funcionalidade para criar usuários porque o intuíto é autenticação
de usuários já existentes e maior foco nos chamados em si. Sinta-se livre para puxar o repositório, criar seus usuários e implementar essa funcionalidade com regras de negócio e métodos de segurança *OU* faça que nem eu e crie alguns usuários de teste no seu banco de dados.

# Segurança e estrutura de diretórios
Para facilitar visualização e compreensão do código, mantive arquivos privados e sensíveis aqui no repositório, mas o ideal é servir a aplicação sem essa pasta (private) em um nível acessível.

# Códigos de erro / retorno

1. OK - Tudo ok. Usuário existe e foi autenticado;
2. WNRPASS - Senha incorreta;
3. UNOW - Usuário desconhecido;
4. FRML - Quantidade de caracteres não respeitando o padrão estabelecido;
5. FRME - Campos em branco no formulário;
6. AUTH - Usuário não autenticado / logado
7. ERR - Erro genérico acusado ao não receber a requisição

# Sobre o autor
Sou um programador apaixonado por desenvolvimento web, onde venho me especializando, mas  especificamente às tecnologias voltadas para *frontend*. Sou movido por desafios, adoro maratonas de programação, estudar arquitetura de computadores e ler livros livros, MUUUUUITOS livros.

# Créditos
Crédito à Jorge Sant Ana e Jamilton Damasceno.
