# PHP CLI Word Frequecy counter
CLI task word frequency counter

## Usage
Clone the repository and start the vagrant environment
```bash
git clone https://github.com/robertoladd/rg-test.git
vagrant up
vagrant ssh
cd /vagrant/app
echo "The quick brown fox jumps over the lazy dog" | php ./cli.php -t WordFrequency
```
#### Stdin Input
```bash
echo "The quick brown fox jumps over the lazy dog" | php ./cli.php -t WordFrequency
```

#### File Input
```bash
php ./cli.php -t WordFrequency --path=/vagrant/storage/stream1.txt
```

#### URL Input
```bash
php ./cli.php -tWordFrequency --url=https://es.wikipedia.org/wiki/Quentin_Tarantino --cleanhtml=true
```