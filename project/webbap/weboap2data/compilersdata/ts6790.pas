program z14;
var s,n,i: integer;

Function Factorial(n: byte): longint;
begin
if (n = 0) then Factorial := 1
           else Factorial := n*Factorial(n-1);
end;

begin
readln(n);
s:=0;
if (n = 0) then s:= 1
 else
     begin
          for i:=1 to n do
          s:=s+sqr(factorial(i));
     end;
write(s);
end.