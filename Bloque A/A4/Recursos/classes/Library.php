<?php
class Library
{
    private array $books; // Propiedad para almacenar libros
    private string $libraryName; // Nombre de la biblioteca

    // Constructor para inicializar propiedades
    public function __construct(string $libraryName, array $books = [])
    {
        $this->libraryName = $libraryName;
        $this->books = $books;
    }

    // Método para añadir un libro a la biblioteca
    public function addBook(string $title, string $author): void
    {
        $this->books[] = [
            'title' => $title,
            'author' => $author,
        ];
    }

    // Método para eliminar un libro de la biblioteca por su título
    public function removeBook(string $title): bool
    {
        foreach ($this->books as $index => $book) {
            if ($book['title'] === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books); // Reindexar el array
                return true;
            }
        }
        return false; // Libro no encontrado
    }

    // Método para obtener la lista de libros en la biblioteca
    public function getBooks(): array
    {
        return $this->books;
    }

    // Método para obtener el nombre de la biblioteca
    public function getLibraryName(): string
    {
        return $this->libraryName;
    }
}