import requests

url = 'http://localhost:8000/api/upload'
file_path = '/api/csv'
files = {'file': open(file_path, 'rb')}

response = requests.post(url, files=files)
print(response.json())
