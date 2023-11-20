POST /api/manufacturers

```json
{
    "name" : "ACME Corp",
    "description" : "A corporation name used in Warner Bros cartoons",
    "countryCode" : "USA",
    "listedDate" : "2023-11-20T09:52:14.699Z"
}
```

POST /api/products

```json
{
    "mpn": "Foobar",
    "name": "Rocket Powered Roller Skates",
    "description": "Let you skate at unlimited speed",
    "issueDate": "2023-11-20T10:31:19.971Z",
    "manufacturer": "/api/manufacturers/1"
}
```