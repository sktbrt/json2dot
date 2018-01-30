# json2dot
json format to dot notation

# Use 

```shell
php json2dot.php jsonFile.json
```

```shell
php json2dot.php jsonFile.json > jsonProps.txt
```

# Exsample

```json
{
  "one": 1111,
  "two": {
    "aAaa": [1990, 1, 1],
    "bbb": "Hello",
    "ccc": "ddd"
  },
  "eEEE": 2
}
```

To

```
one = 1111
two.aAaa.0 = 1990
two.aAaa.1 = 1
two.aAaa.2 = 1
two.bbb = Hello
two.ccc = ddd
eEEE = 2
```
