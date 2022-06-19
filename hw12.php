<?php

class Contacts
{
}
interface NewContact
{
    public function name($value): NewContact;
    public function surname($value): NewContact;
    public function phone($value): NewContact;
    public function email($value): NewContact;
    public function address($value): NewContact;
}
class Contact implements NewContact
{
    private $contact;
    public function __construct()
    {
        $this->reset();
    }
    public function reset(): NewContact
    {
        $this->contact = new Contacts();
        return $this;
    }
    public function phone($value): NewContact
    {
        $this->contact->phone = $value;
        return $this;
    }
    public function name($value): NewContact
    {
        $this->contact->name = $value;
        return $this;
    }
    public function surname($value): NewContact
    {
        $this->contact->surname = $value;
        return $this;
    }
    public function email($value): NewContact
    {
        $this->contact->email = $value;
        return $this;
    }
    public function address($value): NewContact
    {
        $this->contact->address = $value;
        return $this;
    }
    public function build(): Contacts
    {
        $build = $this->contact;
        $this->reset();
        return $build;
    }
}

$contact = new Contact();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();

$newContact2 = $contact->phone('000-777-000')
    ->name("Frank")
    ->surname("Test")
    ->email("frank@email.com")
    ->address("Frank's address")
    ->build();

echo '<pre>';
print_r($newContact);
print_r($newContact2);
echo '</pre>';
