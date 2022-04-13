program recursion_factorial;
var n:integer;
function FACT(n : integer) : Longint;
begin
   if (n=1)or(n=0) then FACT :=1
   else
    FACT := FACT(n-1)*n
end;

begin
  readln(n);
  writeln(FACT(n));

end.