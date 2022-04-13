program t8x6;
var n:integer;
    f:longInt;

function factorial(n:integer):longInt;
       begin
           if n=1 then
            factorial:=1
           else
              factorial:=n*factorial(n-1);
       end;

begin
    clrscr;
    repeat
         writeln('Vvedite celoe 4islo 0<N<=12');
         readln(n);
    until (n>0) and (n<=12);

    f:=factorial(n);
    writeln('N!= ',f);
    readkey;

end.