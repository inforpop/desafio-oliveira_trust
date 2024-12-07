import requests
url = 'http://localhost:8000/api/upload-history'
params = {'file_name': 'InstrumentsConsolidatedFile_20241205_1.csv'}

response = requests.get(url, params=params)
print(response.json())
