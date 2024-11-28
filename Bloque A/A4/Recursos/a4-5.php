<?php
declare(strict_types = 1);

class Account {
    public    AccountNumber $number;
    public    string        $type;
    protected float         $balance;

    public function __construct(AccountNumber $number, string $type, float $balance = 0.00)
    {
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
    }

    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}

class AccountNumber
{
    public int $accountNumber;
    public int $routingNumber;

    public function __construct(int $accountNumber,
                                int $routingNumber)
    {
        $this->accountNumber = $accountNumber;
        $this->routingNumber = $routingNumber;
    }
}

class Book
{
    public string $title;
    public string $author;
    public int $pages;

    public function __construct(string $title, string $author, int $pages)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }
}

class Library
{
    private array $books = []; // Colección de libros

    // Método para agregar un libro a la biblioteca
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    // Método para eliminar un libro por su título
    public function removeBook(string $title): bool
    {
        foreach ($this->books as $index => $book) {
            if ($book->title === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books); // Reindexar el array
                return true;
            }
        }
        return false; // Libro no encontrado
    }

    // Método para listar todos los libros en la biblioteca
    public function listBooks(): array
    {
        return $this->books;
    }
}

// Crear algunos libros
$book1 = new Book("1984", "George Orwell", 328);
$book2 = new Book("Brave New World", "Aldous Huxley", 268);
$book3 = new Book("The Great Gatsby", "F. Scott Fitzgerald", 180);

// Crear la biblioteca
$library = new Library();

// Agregar libros a la biblioteca
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

// Eliminar un libro
$library->removeBook("1984");

// Obtener la lista de libros
$books = $library->listBooks();

// Create an object to store in the property
$numbers = new AccountNumber(12345678, 987654321);
// Create instance of Account class + set properties
$account = new Account($numbers, 'Savings', 10.00);
?>
<?php include 'includes/header.php'; ?>
<h2><?= $account->type ?> Account</h2>
Account <?= $account->number->accountNumber ?><br>
Routing <?= $account->number->routingNumber ?><br>

    <?php foreach ($books as $book): ?>
        <strong>Title:</strong> <?= ($book->title) ?>,
            <strong>Author:</strong> <?= ($book->author) ?>,
            <strong>Pages:</strong> <?= $book->pages ?><br>
    <?php endforeach; ?>

<?php include 'includes/footer.php'; ?>