# Sistema de Consolidação de Relatórios - RHxLogística Tora Transportes

## Sobre
Ferramenta simples de ETL Tora Transportes criada para cruzar dados de motoristas (Banco RH) com o desempenho da frota (Banco Operacional). 
O objetivo é identificar o custo real de cada rota por motorista, consolidando informações de CPF, Matrícula e Placa em um relatório único em Excel.

### Especificações Técnicas para rodar localmente
- **Linguagem:** PHP 7.3.x
- **Banco de Dados:** Oracle Database 12c (2 instâncias locais)
- **Extensão PHP:** OCI8 (Oracle Call Interface)
- **Frontend:** Bootstrap 4.3.1 e jQuery 3.4.1
- 
## Estrutura
- `config.php`: Definições de conexões e ambientes.
- `interface.html`: Interface web Bootstrap 4.
- `style.css`: Identidade visual institucional.
- `main.js`: Validação e feedback de interface.
- `relatorio.php`: Lógica de execução via OCI8.
- `procedimentos.sql`: Código PL/SQL para processamento em banco.

## Instrução
0. REALIZAR BACKUP DOS BANCOS ANTES DE RODAR O PROCESSO!
1. Instalar o **Oracle Instant Client** na máquina servidora.
2. Habilitar `extension=oci8_12c` no `php.ini`.
3. Executar o arquivo `script.sql` no banco de dados operacional.
4. Configurar o arquivo `config.php` com os hostnames locais.
5. Copiar a pasta do projeto para o diretório `/var/www/html` ou `C:/xampp/htdocs`.


## Licença e Créditos

Licença MIT. Disponível para modificação e distribuição livre, desde que atribua os créditos ao autor original.

## Autor
- **GitHub:** [trsilva23]
- **E-mail:** [trsilva23.contato@gmail.com] 


