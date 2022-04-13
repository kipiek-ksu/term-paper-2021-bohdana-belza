program   qwe3;
type student = record
surname:string;
name:string;
first_name:string;
street:string;
house: integer;
flat:integer;
end;
var street:string; n,i:integer; a:student;
begin
readln(street);
readln(n);
for i:=1 to n do
begin
readln(a.surname);
readln(a.name);
readln(a.first_name);
readln(a.street);
readln(a.house);
readln(a.flat);
if street=a.street then
                   begin
                   writeln(a.surname);
                   writeln(a.name);
                   writeln(a.first_name);
                   writeln(a.street);
                   writeln(a.house);
                   writeln(a.flat);
                   end;
end;
end.
