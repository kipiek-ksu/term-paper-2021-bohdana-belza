Program pr38;
type Mas= array[1..200] of integer;
Var  n, m, k, i:integer; a,b,c:mas;
 procedure Zamin(mas1:mas;k1,n1:integer; Var c1:Mas);
 Var t:integer; find,flag:boolean; nmin, min:integer;
 begin
 flag:=false;
  for t:=1 to n1 do
  if mas1[t]=k1 then flag:=true;
  if flag = false then
	   begin
            nmin:=1;
             for t:=2 to n1 do
             if mas1[t]<mas1[nmin] then min:=mas1[t];
             t:=1;
             while mas1[t]<>min do
             begin
             inc(nmin);
             inc(t);
             end;
            mas1[nmin]:=k1;
           end;
    for t:=1 to n do
	c1[t]:=mas1[t];
    end;


begin
readln(n,m);
readln(k);
for i:=1 to n do  read(a[i]);
for i:=1 to m do read(b[i]);
Zamin(a,k,n,c);
for i:=1 to n do
write (c[i],' ');
Zamin(b,k,m,c);
writeln;
for i:=1 to m do
write (c[i],' ');
end.