Program Akerm;
Var
 k,l,F:real;
function akker(m,n:real):real;
begin
 if m=0 then
  akker:=n+1;
 if (m>0) and (n=0) then
  akker:=akker(m-1,1);
 if (m>0) and (n>0) then
  akker:=akker(m-1,akker(m,n-1));
end;
begin
 Read(k,l);
 if k=0 then
  F:=akker(k,l+1) 
 else
  if l=0 then
   F:=akker(k-1,1)
  else
   f:=akker(k-1,akker(k,l-1));
 Writeln(F);
end.