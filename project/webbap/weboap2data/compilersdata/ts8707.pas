
program t8z13;
var A:integer;
  i,j:integer;
  m,n:integer;

function Ak(n,m:integer):integer;
begin
    if n=0 then
     Ak:=m+1;
    if (n<>0) and (m=0) then
     Ak:=Ak(n-1,1);
    if (m>0) and (n>0) then
     Ak:=Ak(n-1,Ak(n,m-1));
end;

begin
    repeat
      
         readln(n,m);
    until (m>=0) and (n>=0);

    A:=Ak(n,m);

    writeln(A);
    
end.