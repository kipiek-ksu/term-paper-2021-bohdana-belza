Var
 m,n,a:longint;
function akker(m,n:extended):extended;
begin
 if m=0 then
  akker:=n+1;
 if (m>0) and (n=0) then
  akker:=akker(m-1,1);
 if (m>0) and (n>0) then
  akker:=akker(m-1,akker(m,n-1));
end;
begin
 Readln(m);
 Readln(n);
 a:=akker(m,n);
 Writeln(a);
 readkey;
end.