oliveira_trust
Documentação Detalhada no README
README.md
markdown
# API de Upload de Arquivos

## Descrição
Esta API permite o upload de arquivos, histórico de uploads e a busca por conteúdo específico dentro dos arquivos.

## Endpoints

### 1. Upload de Arquivo
**POST /api/upload**

**Parâmetros**:
- `file` (form-data): Arquivo no formato CSV ou XLSX.

**Exemplo de Requisição**:
```bash
curl -X POST "http://localhost:8000/api/upload" -F "file=@path/to/your/file.csv"
Resposta:

json
{
  "message": "File uploaded successfully"
}
2. Histórico de Upload de Arquivo
GET /api/upload-history

Parâmetros:

file_name (query): Nome do arquivo.

date (query): Data do upload (formato AAAA-MM-DD).

Exemplo de Requisição:

bash
curl -X GET "http://localhost:8000/api/upload-history?file_name=example.csv"
Resposta:

json
[
  {
    "id": 1,
    "file_name": "example.csv",
    "created_at": "2024-08-22T12:34:56Z",
    "updated_at": "2024-08-22T12:34:56Z"
  }
]
3. Buscar Conteúdo do Arquivo
GET /api/search

Parâmetros (opcional):

TckrSymb (query): Símbolo do ticker.

RptDt (query): Data do relatório (formato AAAA-MM-DD).

Exemplo de Requisição:

bash
curl -X GET "http://localhost:8000/api/search?TckrSymb=AMZO34&RptDt=2024-08-26"
Resposta:

json
{
  "RptDt": "2024-08-22",
  "TckrSymb": "AMZO34",
  "MktNm": "EQUITY-CASH",
  "SctyCtgyNm": "BDR",
  "ISIN": "BRAMZOBDR002",
  "CrpnNm": "AMAZON.COM, INC"
}
Como Rodar o Projeto
Clone o repositório:

bash
git clone https://github.com/seu-usuario/desafio-api.git
cd desafio-api
Instale as dependências:

composer install
Configure o arquivo .env com as informações do seu banco de dados.

Execute as migrations:

php artisan migrate
Inicie o servidor:

php artisan serve
Acesse a documentação da API no navegador:

http://localhost:8000/swagger