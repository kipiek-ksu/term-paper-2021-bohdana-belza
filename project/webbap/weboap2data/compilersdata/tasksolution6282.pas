Program pr13;
Var m, n, k:real;  t:integer;
begin
read(m,n);
t:=0;
if m>n then t:=0 else
while m<n do
        begin
           m:=m+(m*0.2);
           inc(t);
        end;
writeln(t);
end.