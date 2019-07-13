# Usage

1. Build the Docker image:

```bash
docker build -t speaky .
```

2. Run the tests:

```bash
docker run --env-file .env speaky bin/phpunit --testdox --colors=always --coverage-text
```

3. Run the commands:

```bash
docker run --env-file .env speaky bin/console Spain
docker run --env-file .env speaky bin/console Spain England
```
