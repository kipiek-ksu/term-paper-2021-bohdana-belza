Program Lab_10_119;


Type
    TChuild = record
       Surname: string[20];
       name: string[20];
       year: integer;
       sickness: string[20];
       vaccin: string[3];
       address: string[20]
    end;


    info = file of TChuild;


var
   n,i: integer;
   children: TChuild;
   inf: info;

procedure add_info( var inf: info);

var
   i: integer;
   Children: TChuild;
   begin
        write('Enter the number of children: ');
        readln(n);

        assign(inf,'information.pas');
        rewrite(inf);


        for i:= 1 to n do
        begin
             with children do
             begin
                  write('Surname: ');
                  read(surname);
                  write('Name: ');
                  read(name);
                  write('Year: ');
                  read(year);
                  write('Sickness: ');
                  read(sickness);
                  write('Vaccin: ');
                  read(vaccin);
                  write('Address: ');
                  read(address);
                  write;

             end;
             write(inf,children)
        end;

        close(inf)
   end;


procedure print_info( var inf: info);

var Children: TChuild;
begin
     assign(inf,'information.pas');
     reset(inf);

     while not (eof(inf)) do
     begin
     read(inf,Children);
     if (2007 - Children.year > 5) then
     begin
          with Children do
          begin
               write('Surname: ',surname);
               write('Name: ',name);
               write('Year: ',year);
               write('Sickness: ',sickness);
               write('Vaccin: ',vaccin);
               write('Address: ',address);
          end
     end
     end;
     close(inf)
end;


begin
     clrscr;
     add_info(inf);
     print_info(inf);

end.