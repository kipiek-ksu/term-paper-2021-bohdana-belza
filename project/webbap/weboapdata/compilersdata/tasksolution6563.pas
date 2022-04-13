program zac1;
var a:array [1..10,1..9]of integer;
    s,k,i,j,n,l:integer;
    sa:real;
    f:boolean;
begin

 randomize;
 writeln('n>0');
 repeat
 write('n=');readln(n);
 until n>0;
 for i:=1  to n do
    for j:=1 to 9 do a[i,j]:=random(60);

 for i:=1  to n do
               begin
                writeln;
                for j:=1 to 9 do  write(a[i,j]:8);
                end;
 writeln;
 for i:=1 to 72 do write('-');
 writeln;

  for j:=1  to 9 do
                begin
                s:=0;
                for i:=1 to n do s:=s+a[i,j];
                sa:=round(s/n*100)/100;
                write(sa:8:2);
                end;

 writeln;
 readln;
 end.