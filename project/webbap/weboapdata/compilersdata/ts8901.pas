Program z9;
Var i,n:integer;
    j:longint;
Function fib(n:byte):longint;
begin
if (n=1) or (n=2) then fib:=1 else
fib:=fib(n-1)+fib(n-2);
end;

begin
n:=0;
Repeat
n:=n+1;
j:=fib(n);
Write(n,j);
Until (j mod 100)=0;
end.