# lojavirtual/pagarme

Integração com PagarMe na API versão 5.

## Como utilizar

```php

use LojaVirtual\PagarMe;

$pagarMe = new PagarMe($publicKey, $secretKey);
$payload = array('seu-payload-aqui');
$response = $pagarMe
    ->order()
    ->insert($payload);
```

### Enjoy it :)