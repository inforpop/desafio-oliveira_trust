import requests
url = 'http://localhost:8000/api/search'
params = {'TckrSymb': 'AMZO34', 'RptDt': '2024-08-26'}

response = requests.get(url, params=params)
print(response.json())
