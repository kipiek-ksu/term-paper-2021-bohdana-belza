program zad3_37;
var n,m,i:integer;
    k:integer;
    a,b:array[1..100] of integer;

procedure a(h: integer);
var i:integer;
begin
     for i:=1 to h do
     begin
          read(a[i]);
     end;
end;

procedure b(h: integer);
var i:integer;
begin
     for i:=1 to h do
     begin
          read(b[i]);
     end;
end;

procedure a(l: integer);
var i,j:integer;
    f:boolean;
begin
     f:=false;
     for i:=1 to n do
     begin
          if a[i] = l then
               f:=true;
     end;
     if f=true then
     begin
         for i:=1 to n do
         begin
             for j:=i+1 to n do
             begin
                  if a[i]>a[j] then
                  begin
                       a[i]:=k;
                       f:=false;
                       break;
                  end;
             end;
             if f = false then
                break;
         end;
     end;
end;

procedure b(l: integer);
var i,j:integer;
    f:boolean;
begin
     f:=false;
     for i:=1 to m do
     begin
          if b[i] = l then
               f:=true;
     end;
     if f=true then
     begin
         for i:=1 to m do
         begin
             for j:=i+1 to m do
             begin
                  if b[i]>b[j] then
                  begin
                       b[i]:=k;
                       f:=false;
                       break;
                  end;
             end;
             if f = false then
                break;
         end;
     end;
end;


begin
     read(n,m,k);
     setmass_a(n);
     setmass_b(m);
     checksetk_a(k);
     checksetk_b(k);
     for i:=1 to n do
         write(a[i],' ');
     for i:=1 to m do
         write(b[i],' ');
end.
