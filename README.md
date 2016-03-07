# wsjayagrosir
web service **Perusahaan Jayagrosir** sebagai **server**, pastikan database telah terimport.

## xml, wsdl
jika pada server service tidak terupdate, bisa dilakukan penghapusan cache  
misal
```
sudo rm /tmp/wsdl-*
```

## restful json
dapat ditest pada terminal, curl  
POST
```
curl -i -H "Accept:application/json" -H "Content-Type:application/json" -XPOST "http://localhost/latihan/jayagrosir/jsonserver2.php" -d '{"desk": "x2", "balance": 18, "vendor":3, "tipe":2}'
```  
PUT, update
```
curl -i -H  "Accept:application/json" -H "Content-Type:application/json" -XPUT "http://localhost/latihan/jayagrosir/jsonserver2.php" -d '{"id": 8, "desk": "termos ubahan","balance":10}'
```
DELETE  
```
curl -i -H  "Accept:application/json" -XDELETE "http://localhost/latihan/jayagrosir/jsonserver2.php?id=11"
```  
GET  
```
curl -i -H "Accept:application/json" -H "Content-Type:application/json" -XGET "http://localhost/latihan/jayagrosir/jsonserver2.php?action=get_babe&id=2"
```
```
curl -i -H "Accept:application/json" -H "Content-Type:application/json" -XGET "http://localhost/latihan/jayagrosir/jsonserver2.php?action=get_babe_list"
```

